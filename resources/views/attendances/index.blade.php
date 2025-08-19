@extends("layouts.main-layout")

@section("content")
  @if ($errors->any())
    <div class="alert alert-danger text-white" role="alert">
    <ul class="mb-0">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
  @endif

  @if (session('success'))
    <div class="alert alert-success text-white">{{ session('success') }}</div>
  @endif
  <div class="row">
    <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        @if (isset($user))
      <h6 class="text-white text-capitalize ps-3">attendances - {{ $user->name }}</h6>
      @else
      <h6 class="text-white text-capitalize ps-3">attendances </h6>
      @endif
      </div>
      </div>
      <div class="card-body px-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
        <thead>
          <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Check in
          </th>
          </tr>
        </thead>
        <tbody>
          @forelse($attendances as $attendance)
        <tr>
        <td>
        <div class="d-flex px-2 py-1">
        <div class="d-flex flex-column justify-content-center">
          <h6 class="mb-0 text-sm">{{ $attendance->user->name }}</h6>
        </div>
        </div>
        </td>
        <td>
        <p class="text-xs font-weight-bold mb-0">
        <span class="text-secondary text-xs font-weight-bold">
          {{ $attendance->date }}
        </span>
        </p>
        </td>
        <td>
        <p class="text-xs font-weight-bold mb-0">
        <span class="text-secondary text-xs font-weight-bold">
          {{ $attendance->check_in }}
        </span>
        </p>
        </td>
        </tr>
      @empty
        <tr>
        <td colspan="4" class="text-center text-muted">No attendances found</td>
        </tr>
      @endforelse
        </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
  </div>
@endsection