@extends('admin.layouts.master')
@section('main')
    <form action="" method="post">
        @csrf
        <div>
            <label for="">Name</label>
            <input type="text" class=" form-control">
        </div>
    </form>
@endsection
