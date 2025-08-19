<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Models\Attendance;
use App\Models\User;
use Date;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->orderBy('date', 'desc')->get();
        return view('attendances.index', compact('attendances'));
    }

    public function getUserAttendance($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->withErrors(provider: ['error' => 'User not found']);
        }
        $attendances = $user->attendances;
        return view('attendances.index', compact('attendances', 'user'));
    }

    public function checkIn($userid)
    {
        $user = User::find($userid);
        $date = date('Y-m-d');
        if (!$user) {
            return back()->withErrors(provider: ['error' => 'User not found']);
        }

        $userAlreadyCheckIn = Attendance::where('user_id', $userid)
            ->where('date', $date)
            ->exists();

        if ($userAlreadyCheckIn) {
            return back()->withErrors(provider: ['error' => 'User already checked in for today!']);
        }

        Attendance::create([
            "user_id" => $userid,
            "date" => $date,
            "check_in" => now(),
        ]);
        return redirect()->route('attendances.index')->with('success', 'Attendance added successfully.');
    }


}

