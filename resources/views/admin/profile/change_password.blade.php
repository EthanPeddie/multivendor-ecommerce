@extends('admin.layouts.master')

@section('main')
    <div class="page-content">
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 offset-2 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Change Your Password</h6>

                        <form action="{{ route('admin.update.password') }}" method="POST">

                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>

                                <input id="old_password" class="form-control bg-white text-dark" type="password"
                                    name="old_password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>

                                <input id="password" class="form-control bg-white text-dark" type="password"
                                    name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>

                                <input class="form-control bg-white text-dark" type="password" id="password_confirmation"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2">update</button>

                        </form>

                    </div>
                </div>
            </div>
            <!-- right wrapper end -->
        </div>

    </div>
@endsection
