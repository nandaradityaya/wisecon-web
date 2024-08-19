@extends('layouts.sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Products</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">Products</h5>
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

        @if(session('error'))
        <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2" id="error-alert">
            <div class="d-flex align-items-center">
                <div class="font-35 text-danger"><i class="bx bxs-x-circle"></i></div>
                <div class="ms-3">
                    <h6 class="mb-0 text-danger">Error</h6>
                    <div>{{ session('error') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="table-responsive">
            <div id="printbar" style="float:right"></div>
            <br>
            <table id="productTable" class="table mb-0 align-middle" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Thumbnail 1</th>
                        <th>Thumbnail 2</th>
                        <th>Client</th>
                        <th>Project</th>
                        <th>Service</th>
                        <th>Body</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="{{ Storage::url($product->thumbnail_1) }}" width="100" alt="product wisesa consulting">
                        </td>
                        <td>
                            <img src="{{ Storage::url($product->thumbnail_2) }}" width="100" alt="product wisesa consulting">
                        </td>
                        <td>{{ $product->client }}</td>
                        <td>{{ $product->project }}</td>
                        <td>{{ $product->service }}</td>
                        <td>{!! $product->body !!}</td>
                        <td>
                            <div class="d-flex order-actions">
                                <a type="button" class="text-primary bg-light-primary border-0 me-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $product->id }}"><i class="bx bxs-edit"></i></a>
                                <a type="button" class="text-danger bg-light-danger border-0" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $product->id }}"><i class="bx bxs-trash"></i></a> 
                            </div>
                        </td>
                    </tr>

                   
                    @endforeach
                </tbody>
            </table>

            @foreach ($products as $product)
                 <!-- Modal Box Edit -->
                 <div class="modal fade" id="modalEdit{{ $product->id }}" tabindex="-1"
                    aria-labelledby="modalEditLabel{{ $product->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content radius-8">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel{{ $product->id }}">Edit Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                            <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" value="{{ $product->name }}" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image 1</label>
                                        <input class="form-control mb-2" type="file" id="formFile" name="thumbnail_1">
                                        <img src="{{ Storage::url($product->thumbnail_1) }}" width="100" alt="image team wisesa consulting">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image 2</label>
                                        <input class="form-control mb-2" type="file" id="formFile" name="thumbnail_2">
                                        <img src="{{ Storage::url($product->thumbnail_2) }}" width="100" alt="image team wisesa consulting">
                                    </div>
                                    <div class="mb-3">
                                        <label for="client" class="form-label">Client</label>
                                        <input type="text" class="form-control" id="client" value="{{ $product->client }}" name="client">
                                    </div>
                                    <div class="mb-3">
                                        <label for="project" class="form-label">Project</label>
                                        <input type="text" class="form-control" id="project" value="{{ $product->project }}" name="project">
                                    </div>
                                    <div class="mb-3">
                                        <label for="serviceProduct" class="form-label">Service</label>
                                        <input type="text" class="form-control" id="serviceProduct" value="{{ $product->service }}" name="service">
                                    </div>
                                    <div class="mb-3">
                                        <label for="body" class="form-label">Description</label>
                                        <textarea type="text" class="form-control rich-text" id="body" name="body" rows="3">{{ $product->body }}</textarea>
                                    </div>
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

                <!-- Modal Box Delete -->
                <div class="modal fade" id="modalDelete{{ $product->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDeleteLabel{{ $product->id }}">Delete Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this data?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary radius-8" data-bs-dismiss="modal">Cancel</button>
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger radius-8">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal Box Add New -->
<div class="modal fade" id="modalAddNew" tabindex="-1"
    aria-labelledby="modalAddNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content radius-8">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddNewLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name..." name="name">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Thumbnail 1</label>
                        <input class="form-control" type="file" id="formFile" required name="thumbnail_1">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Thumbnail 2</label>
                        <input class="form-control" type="file" id="formFile" required name="thumbnail_2">
                    </div>
                    <div class="mb-3">
                        <label for="client" class="form-label">Client</label>
                        <input type="text" class="form-control" id="client" placeholder="Client..." name="client">
                    </div>
                    <div class="mb-3">
                        <label for="project" class="form-label">Project</label>
                        <input type="text" class="form-control" id="project" placeholder="Project..." name="project">
                    </div>
                    <div class="mb-3">
                        <label for="serviceProduct" class="form-label">Service</label>
                        <input type="text" class="form-control" id="serviceProduct" placeholder="Service..." name="service">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Description</label>
                        <textarea type="text" class="form-control rich-text" id="body" name="body" rows="3"></textarea>
                    </div>
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