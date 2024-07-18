@extends('layouts.sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Career</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Career</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">Career</h5>
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
            <table id="service" class="table mb-0 align-middle" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Body</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Job Description</th>
                        <th>Requirement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($careers as $career)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $career->title }}</td>
                        <td>
                            <img src="{{ Storage::url($career->thumbnail) }}" width="100" alt="">
                        </td>
                        <td>{{ $career->body }}</td>
                        <td>{{ $career->category }}</td>
                        <td>{{ $career->location }}</td>
                        <td>
                            @forelse ($career->job_descriptions as $job_description)
                                <ul>
                                    <li>{{ $job_description->job_desc }}</li>
                                </ul>
                            @empty
                            @endforelse
                        </td>
                        <td>
                            @forelse ($career->requirements as $requirement)
                                <ul>
                                    <li>{{ $requirement->requirement }}</li>
                                </ul>
                            @empty
                            @endforelse
                        </td>
                        <td>
                            <div class="d-flex order-actions">
                                <a type="button" class="text-primary bg-light-primary border-0 me-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $career->id }}"><i class="bx bxs-edit"></i></a>
                                <a type="button" class="text-danger bg-light-danger border-0" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $career->id }}"><i class="bx bxs-trash"></i></a> 
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach ($careers as $career)
                 <!-- Modal Box Edit -->
                 <div class="modal fade" id="modalEdit{{ $career->id }}" tabindex="-1"
                    aria-labelledby="modalEditLabel{{ $career->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content radius-8">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditLabel{{ $career->id }}">Edit career</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                            <form method="POST" action="{{ route('admin.careers.update', $career->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" value="{{ $career->title }}" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Thumbnail</label>
                                        <input class="form-control mb-2" type="file" id="formFile" name="thumbnail">
                                        <img src="{{ Storage::url($career->thumbnail) }}" width="100" alt="thumbnail career wisesa consulting">
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="category" value="{{ $career->category }}" name="category">
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" value="{{ $career->location }}" name="location">
                                    </div>
                                    <div class="mb-3">
                                        <label for="body" class="form-label">Body</label>
                                        <textarea type="text" class="form-control" id="body" rows="3" name="body">{{ $career->body }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="job-descriptions" class="form-label">Job Descriptions</label>
                                        <div id="edit-job-descriptions-container">
                                            @forelse($career->job_descriptions as $job_description)
                                                <input type="text" class="form-control mb-2" value="{{ $job_description->job_desc }}" name="job_descriptions[]">
                                            @empty
                                                <input type="text" class="form-control mb-2" placeholder="Job Descriptions..." name="job_descriptions[]">
                                            @endforelse
                                        </div>
                                        <button type="button" class="btn btn-primary mt-2" id="edit-job-descriptions">+</button>
                                    </div>
                                    <div class="mb-3">
                                        <label for="requirements" class="form-label">Requirements</label>
                                        <div id="edit-requirements-container">
                                            @forelse($career->requirements as $requirement)
                                                <input type="text" class="form-control mb-2" value="{{ $requirement->requirement }}" name="requirements[]">
                                            @empty
                                                <input type="text" class="form-control mb-2" placeholder="Requirements..." name="requirements[]">
                                            @endforelse
                                        </div>
                                        <button type="button" class="btn btn-primary mt-2" id="edit-requirements">+</button>
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
                <div class="modal fade" id="modalDelete{{ $career->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $career->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDeleteLabel{{ $career->id }}">Delete Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this career?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary radius-8" data-bs-dismiss="modal">Cancel</button>
                                <form method="POST" action="{{ route('admin.careers.destroy', $career) }}">
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
                <h5 class="modal-title" id="modalAddNewLabel">Add New Career</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.careers.store') }}" enctype="multipart/form-data">
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
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" placeholder="Category..." name="category">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" placeholder="Location..." name="location">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea type="text" class="form-control" id="body" placeholder="Body..." rows="3" name="body"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Job Description</label>
                        <div id="job-descriptions-container">
                            <input type="text" class="form-control mb-2" placeholder="Job Description..." name="job_descriptions[]">
                        </div>
                        <button type="button" class="btn btn-primary" id="add-job-descriptions">+</button>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Requirement</label>
                        <div id="requirements-container">
                            <input type="text" class="form-control mb-2" placeholder="Requirement..." name="requirements[]">
                        </div>
                        <button type="button" class="btn btn-primary" id="add-requirements">+</button>
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