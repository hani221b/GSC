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
        <h6 class="text-white text-capitalize ps-3">Users</h6>
      </div>
      </div>
      <div class="card-body px-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
        <thead>
          <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Joined at
          </th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Operations
          </th>
          <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $user)
        <tr>
        <td>
        <div class="d-flex px-2 py-1">
        <div class="d-flex flex-column justify-content-center">
          <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
        </div>
        </div>
        </td>
        <td>
        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
        </td>
        <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold">
        {{ $user->created_at->format('d/m/Y') }}
        </span>
        </td>
        <td class="align-middle text-center">
        <a href="{{ route('users.edit', $user->id) }}" class="text-secondary font-weight-bold text-xs">
        Edit
        </a>
        </td>
        </tr>
      @empty
        <tr>
        <td colspan="4" class="text-center text-muted">No users found</td>
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