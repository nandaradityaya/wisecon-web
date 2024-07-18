@extends('layouts/sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Services</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Services</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">Services</h5>
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

        <p class="mb-0 mt-3 text-black d-flex align-items-center justify-content-center d-lg-none d-md-block d-sm-block"><i class="lni lni-whatsapp text-success me-2"></i>Credit: 816,247 (Can Invite 1484 People)</p>
        <div class="table-responsive">
            <div id="printbar" style="float:right"></div>
            <br>
            <table id="serviceTable" class="table mb-0 align-middle" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>excerpt</th>
                        <th>Body</th>
                        <th>Key Feature</th>
                        <th>Our Approaches</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->title }}</td>
                        <td>
                            <img src="{{ Storage::url($service->thumbnail) }}" width="100" alt="">
                        </td>
                        <td>{{ $service->excerpt }}</td>
                        <td>{{ $service->body }}</td>
                        <td>
                            @forelse ($service->key_features as $keyfeature)
                                <ul>
                                    <li>{{ $keyfeature->body }}</li>
                                </ul>
                            @empty
                            @endforelse
                        </td>
                        <td>
                            @forelse ($service->our_approaches as $ourapproach)
                                <ul>
                                    <li>{{ $ourapproach->body }}</li>
                                </ul>
                            @empty
                            @endforelse
                        </td>
                        <td>
                            <div class="d-flex order-actions">
                                <a type="button" class="text-primary bg-light-primary border-0 me-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $service->id }}"><i class="bx bxs-edit"></i></a>
                                <a type="button" class="text-danger bg-light-danger border-0" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $service->id }}"><i class="bx bxs-trash"></i></a> 
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach ($services as $service)
                 <!-- Modal Box Edit -->
                 <div class="modal fade" id="modalEdit{{ $service->id }}" tabindex="-1"
                    aria-labelledby="modalEditLabel{{ $service->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content radius-8">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel{{ $service->id }}">Edit service</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                            <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" value="{{ $service->title }}" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Thumbnail</label>
                                        <input class="form-control mb-2" type="file" id="formFile" name="thumbnail">
                                        <img src="{{ Storage::url($service->thumbnail) }}" width="100" alt="image team wisesa consulting">
                                    </div>
                                    <div class="mb-3">
                                        <label for="excerpt" class="form-label">Excerpt</label>
                                        <input type="text" class="form-control" id="excerpt" value="{{ $service->excerpt }}" name="excerpt">
                                    </div>
                                    <div class="mb-3">
                                        <label for="body" class="form-label">Description</label>
                                        <textarea type="text" class="form-control" id="body" name="body" rows="3">{{ $service->body }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="key-features" class="form-label">Key Features</label>
                                        <div id="edit-key-features-container">
                                            @forelse($service->key_features as $keyfeature)
                                                <input type="text" class="form-control mb-2" value="{{ $keyfeature->body }}" name="key_features[]">
                                            @empty
                                                <input type="text" class="form-control mb-2" placeholder="Write your copywriting" name="key_features[]">
                                            @endforelse
                                        </div>
                                        <button type="button" class="btn btn-primary mt-2" id="edit-key-feature">+</button>
                                    </div>
                                    <div class="mb-3">
                                        <label for="our-approaches" class="form-label">Our Approach</label>
                                        <div id="edit-our-approachess-container">
                                            @forelse($service->our_approaches as $ourapproach)
                                                <input type="text" class="form-control mb-2" value="{{ $ourapproach->body }}" name="our_approaches[]">
                                            @empty
                                                <input type="text" class="form-control mb-2" placeholder="Write your copywriting" name="our_approaches[]">
                                            @endforelse
                                        </div>
                                        <button type="button" class="btn btn-primary mt-2" id="edit-our-approaches">+</button>
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
                <div class="modal fade" id="modalDelete{{ $service->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $service->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDeleteLabel{{ $service->id }}">Delete Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this service?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary radius-8" data-bs-dismiss="modal">Cancel</button>
                                <form method="POST" action="{{ route('admin.services.destroy', $service) }}">
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
                <h5 class="modal-title" id="modalAddNewLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title..." name="title">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Thumbnail</label>
                        <input class="form-control" type="file" id="formFile" name="thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <input type="text" class="form-control" id="excerpt" placeholder="Excerpt..." name="excerpt">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="body" placeholder="Description..." name="body" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Key Features</label>
                        <div id="key-features-container">
                            <input type="text" class="form-control mb-2" placeholder="Write your copywriting" name="key_features[]">
                        </div>
                        <button type="button" class="btn btn-primary" id="add-key-feature">+</button>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Our Approaches</label>
                        <div id="our-approachess-container">
                            <input type="text" class="form-control mb-2" placeholder="Write your copywriting" name="our_approaches[]">
                        </div>
                        <button type="button" class="btn btn-primary" id="add-our-approaches">+</button>
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