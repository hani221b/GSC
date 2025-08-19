@extends("layouts.main-layout")

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Profile</h6>
                    </div>
                </div>
                <div class="card-body px-4">

                    {{-- Show messages --}}
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

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="input-group input-group-outline mb-3 focused">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>

                        <div class="input-group input-group-outline mb-3 focused">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="input-group input-group-outline mb-3 focused">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Leave empty to keep current password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Update
                                Profile</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection