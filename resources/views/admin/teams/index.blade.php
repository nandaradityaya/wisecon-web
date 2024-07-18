@extends('layouts.sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Teams</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Teams</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">Teams</h5>
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
            <table id="homeSlider" class="table mb-0 align-middle" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Linkedin</th>
                        <th>Instagram</th>
                        <th>Behance</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($teams as $team)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ Storage::url($team->img_team) }}" width="100" alt="image team wisesa consulting">
                        </td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->title }}</td>
                        <td>{{ $team->linkedin }}</td>
                        <td>{{ $team->instagram }}</td>
                        <td>{{ $team->behance }}</td>
                        <td>
                            <div class="d-flex order-actions">
                                <a type="button" class="text-primary bg-light-primary border-0 me-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $team->id }}"><i class="bx bxs-edit"></i></a>
                                <a type="button" class="text-danger bg-light-danger border-0" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $team->id }}"><i class="bx bxs-trash"></i></a> 
                            </div>
                        </td>
                    </tr>

                   
                    @endforeach
                </tbody>
            </table>

            @foreach ($teams as $team)
                 <!-- Modal Box Edit -->
                 <div class="modal fade" id="modalEdit{{ $team->id }}" tabindex="-1"
                    aria-labelledby="modalEditLabel{{ $team->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content radius-8">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel{{ $team->id }}">Edit Team</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                            <form method="POST" action="{{ route('admin.teams.update', $team->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control mb-2" type="file" id="formFile" name="img_team">
                                        <img src="{{ Storage::url($team->img_team) }}" width="100" alt="image team wisesa consulting">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" value="{{ $team->name }}" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" value="{{ $team->title }}" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="linkedin" class="form-label">Linkedin</label>
                                        <input type="text" class="form-control" id="linkedin" value="{{ $team->linkedin }}" name="linkedin">
                                    </div>
                                    <div class="mb-3">
                                        <label for="instagram" class="form-label">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" value="{{ $team->instagram }}" name="instagram">
                                    </div>
                                    <div class="mb-3">
                                        <label for="behance" class="form-label">Behance</label>
                                        <input type="text" class="form-control" id="behance" value="{{ $team->behance }}" name="behance">
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
                <div class="modal fade" id="modalDelete{{ $team->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $team->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDeleteLabel{{ $team->id }}">Delete Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this data?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary radius-8" data-bs-dismiss="modal">Cancel</button>
                                <form method="POST" action="{{ route('admin.teams.destroy', $team) }}">
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
                    <h5 class="modal-title" id="modalAddNewLabel">Add New Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

            <form method="POST" action="{{ route('admin.teams.store') }}" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" required name="img_team">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name..." name="name">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title..." name="title">
                    </div>
                    <div class="mb-3">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" placeholder="Linkedin..." name="linkedin">
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" placeholder="Instagram..." name="instagram">
                    </div>
                    <div class="mb-3">
                        <label for="behance" class="form-label">Behance</label>
                        <input type="text" class="form-control" id="behance" placeholder="Behance..." name="behance">
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