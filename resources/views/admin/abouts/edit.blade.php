@extends('layouts/sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit About Us</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.abouts.index') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit About Us</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">Edit About Us</h5>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.abouts.update', $about->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="aboutUs" class="form-label">About Us</label>
                <input type="text" class="form-control" id="aboutUs" value="{{ $about->body }}" name="body">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="img_about">
            </div>
            <div class="mb-3">
                <label for="vision" class="form-label">Vision</label>
                <input type="text" class="form-control" id="vision" value="{{ $about->vision }}" name="vision">
            </div>
            <div class="mb-3">
                <label for="mission" class="form-label">Mission</label>
                <input type="text" class="form-control" id="mission" value="{{ $about->mission }}" name="mission">
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary radius-6">Back</a>
                <button type="submit" class="btn btn-primary radius-6">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
