@extends("layouts.auth-layout")

@section("content")
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100"
    style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
      <div class="col-lg-4 col-md-8 col-12 mx-auto">
        <div class="card z-index-0 fadeIn3 fadeInBottom">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
          <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login</h4>
          </div>
        </div>
        <div class="card-body">

          @if ($errors->any())
        <div class="alert alert-danger text-white" role="alert">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
      @endif

          @if (session('error'))
        <div class="alert alert-danger text-white">{{ session('error') }}</div>
      @endif
          @if (session('success'))
        <div class="alert alert-success text-white">{{ session('success') }}</div>
      @endif

          <form role="form" action="{{ route('login') }}" method="POST" class="text-start">
          @csrf
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="input-group input-group-outline mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-switch d-flex align-items-center mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
            <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Login</button>
          </div>
          <p class="mt-4 text-sm text-center">
            Don't have an account?
            <a href="{{ route('register-view') }}"
            class="text-primary text-gradient font-weight-bold">Register</a>
          </p>
          </form>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </main>
@endsection