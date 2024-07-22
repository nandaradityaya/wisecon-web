@extends('layouts.sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Contact</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">Contact</h5>
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
            <table id="dataTable" class="table mb-0 align-middle" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Link Map</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->link_map }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone_number }}</td>
                        <td>
                            <div class="d-flex order-actions">
                                <a type="button" class="text-primary bg-light-primary border-0 me-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $contact->id }}"><i class="bx bxs-edit"></i></a>
                                <a type="button" class="text-danger bg-light-danger border-0" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $contact->id }}"><i class="bx bxs-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach ($contacts as $contact)
            <!-- Modal Box Edit -->
            <div class="modal fade" id="modalEdit{{ $contact->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $contact->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content radius-8">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel{{ $contact->id }}">Edit Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('admin.contacts.update', $contact->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="linkMap" class="form-label">Link Map</label>
                                    <input type="text" class="form-control" id="linkMap" value="{{ $contact->link_map }}" name="link_map">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea type="text" class="form-control" id="address" name="address" rows="3">{{ $contact->address }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ $contact->email }}" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phoneNumber" value="{{ $contact->phone_number }}" name="phone_number">
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

            <!-- Modal Box Delete -->
            <div class="modal fade" id="modalDelete{{ $contact->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $contact->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteLabel{{ $contact->id }}">Delete Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this data?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary radius-8" data-bs-dismiss="modal">Cancel</button>
                            <form method="POST" action="{{ route('admin.contacts.destroy', $contact->id) }}">
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
                <h5 class="modal-title" id="modalAddNewLabel">Add New Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.contacts.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="linkMap" class="form-label">Link Map</label>
                    <input type="text" class="form-control" id="linkMap" placeholder="Link Map..." name="link_map">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea type="text" class="form-control" id="address" placeholder="Address..." name="address" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email..." name="email">
                </div>
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number..." name="phone_number">
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
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Delete Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary radius-8"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger radius-8">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection