@extends('admin.layouts.master')

@section('main')
    <link rel="stylesheet" href="node_modules/dropzone/dist/min/dropzone.min.css">
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>

            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <a href="{{ route('admin.slider.index') }}" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="#"></i>
                    Back
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Create Slider</h6>
                        </div>
                        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Banner</label>
                                <input type="file" class="dropify"
                                    data-default-file="{{ asset('uploads/no_image.jpg') }}" data-height="150"
                                    data-width="150" name="banner" data-max-file-size-preview="2M"
                                    data-show-errors="true" />
                                @error('banner')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Type</label>
                                <input type="text" class=" form-control bg-white text-dark" name="type">
                                @error('type')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" class=" form-control bg-white text-dark" name="title">
                                @error('title')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Starting Price</label>
                                <input type="number" class=" form-control bg-white text-dark" name="starting_price">
                                @error('starting_price')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Btn Url</label>
                                <input type="text" class=" form-control bg-white text-dark" name="btn_url">
                                @error('btn_url')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Serial</label>
                                <input type="text" class=" form-control bg-white text-dark" name="serial">
                                @error('serial')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select class=" form-control bg-white text-dark">
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class=" btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- row -->

    </div>
@endsection
