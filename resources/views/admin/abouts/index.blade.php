@extends('layouts/sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">About Us</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">About Us</h5>
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-primary radius-8 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalAddNew"><i class="bx bx-plus"></i>Add New</button>
            </div>
        </div>
        @if(session('success'))
            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2" id="success-alert">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-success"><i class="bx bxs-check-circle"></i></div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-success">Success</h6>
                        <div>{{ session('success') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="">
            <div id="printbar" style="float:right"></div>
            <br>
            <table id="dataTable" class="table mb-0 align-middle" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>About Us</th>
                        <th>Image</th>
                        <th>Vision</th>
                        <th>Mission</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $about)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $about->body }}</td>
                            <td>
                                <img src="{{ Storage::url($about->img_about) }}" width="100" alt="image about">
                            </td>
                            <td>{{ $about->vision }}</td>
                            <td>{{ $about->mission }}</td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a type="button" class="text-primary bg-light-primary border-0 me-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $about->id }}">
                                        <i class="bx bxs-edit"></i>
                                    </a>
                    
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Box Edit -->
                        <div class="modal fade" id="modalEdit{{ $about->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $about->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content radius-8">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditLabel{{ $about->id }}">Edit About Us</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.abouts.update', $about->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="aboutUs{{ $about->id }}" class="form-label">About Us</label>
                                                <textarea class="form-control" id="aboutUs{{ $about->id }}" name="body"  rows="3">{{ $about->body }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile{{ $about->id }}" class="form-label">Image</label>
                                                <input class="form-control mb-2" type="file" id="formFile{{ $about->id }}" name="img_about">
                                                <img src="{{ Storage::url($about->img_about) }}" width="100" alt="image about">
                                            </div>
                                            <div class="mb-3">
                                                <label for="vision{{ $about->id }}" class="form-label">Vision</label>
                                                <input type="text" class="form-control" id="vision{{ $about->id }}" value="{{ $about->vision }}" name="vision">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mission{{ $about->id }}" class="form-label">Mission</label>
                                                <input type="text" class="form-control" id="mission{{ $about->id }}" value="{{ $about->mission }}" name="mission">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary radius-6" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary radius-6">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header text-center">
        <h5>Example View</h5>
    </div>
    <div class="card-body">
        <img src="../assets/admin/images/example-about-us.png" alt="about-us" style="width: 100%">
    </div>
</div>


<!-- Modal Box Add New -->
<div class="modal fade" id="modalAddNew" tabindex="-1"
    aria-labelledby="modalAddNewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content radius-8">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddNewLabel">Add New Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.abouts.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                        
                    <div class="mb-3">
                        <label for="aboutUs" class="form-label">About Us</label>
                        <textarea rows="3" class="form-control" id="aboutUs" placeholder="About Us..." name="body"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="img_about" required>
                    </div>
                    <div class="mb-3">
                        <label for="vision" class="form-label">Vision</label>
                        <input type="text" class="form-control" id="vision" placeholder="Vision..." name="vision">
                    </div>
                    <div class="mb-3">
                        <label for="mission" class="form-label">Mission</label>
                        <input type="text" class="form-control" id="mission" placeholder="Mission..." name="mission">
                    </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary radius-6"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary radius-6">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>



@endsection