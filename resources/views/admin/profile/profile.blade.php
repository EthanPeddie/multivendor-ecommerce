@extends('admin.layouts.master')

@section('main')
    <div class="page-content">
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="card-title mb-0">{{ Auth::user()->name }}</h6>
                        </div>
                        <div class="mt-3">
                            <figure class="">
                                <img src="{{ Auth::user()->photo == null ? asset('uploads/no_image.jpg') : asset('uploads/admin/profile/' . Auth::user()->photo) }}"class=" rounded-circle img-thumbnail"
                                    width="100px" height="100px" alt="profile cover">
                            </figure>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email</label>
                            <p class="text-muted">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                            <p class="text-muted">{{ Auth::user()->address }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ Auth::user()->phone }}</p>
                        </div>
                        {{-- <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Your Profile</h6>

                        <form action="{{ route('admin.profile.update', Auth::user()->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>

                                <input type="text" class="form-control bg-white text-dark" id="name" name="name"
                                    autocomplete="off" placeholder="Name" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>

                                <input type="text" class="form-control bg-white text-dark" id="username" name="username"
                                    autocomplete="off" placeholder="Username" value="{{ Auth::user()->username }}">
                                @error('username')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control bg-white text-dark" id="email" name="email"
                                    placeholder="Email" value="{{ Auth::user()->email }}">
                                @error('email')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control bg-white text-dark" id="phone" name="phone"
                                    autocomplete="off" placeholder="Phone" value="{{ Auth::user()->phone }}">
                                @error('phone')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>

                                <input type="text" class="form-control bg-white text-dark" id="address" name="address"
                                    autocomplete="off" placeholder="Address" value="{{ Auth::user()->address }}">
                                @error('address')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 w-50">
                                <label for="photo" class="form-label">Image</label>

                                <input type="file" class="dropify"
                                    data-default-file="{{ Auth::user()->photo == null ? asset('uploads/no_image.jpg') : asset('uploads/admin/profile/' . Auth::user()->photo) }}"
                                    data-height="150" name="photo" data-max-file-size-preview="2M"
                                    data-show-errors="true" />
                                @error('photo')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <img src="{{ Auth::user()->photo == null ? asset('uploads/no_image.jpg') : asset('uploads/admin/profile/' . Auth::user()->photo) }}"class=" rounded-circle img-thumbnail"
                                    width="100px" height="100px" alt="profile cover">
                            </div> --}}

                            <button type="submit" class="btn btn-primary me-2">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
            <!-- right wrapper end -->
        </div>

    </div>
@endsection
