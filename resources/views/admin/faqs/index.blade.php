@extends('layouts.sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Frequently Answer Question's</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Frequently Answer Question's</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">Frequently Answer Question's</h5>
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
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>
                            <div class="d-flex order-actions">
                                <a type="button" class="text-primary bg-light-primary border-0 me-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $faq->id }}"><i class="bx bxs-edit"></i></a>
                                <a type="button" class="text-danger bg-light-danger border-0" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $faq->id }}"><i class="bx bxs-trash"></i></a>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            @foreach ($faqs as $faq)
            <!-- Modal Box Edit -->
            <div class="modal fade" id="modalEdit{{ $faq->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $faq->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content radius-8">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel{{ $faq->id }}">Edit FAQ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="question" class="form-label">Question</label>
                                    <textarea rows="3" class="form-control" id="question" placeholder="Question..." name="question">{{ $faq->question }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="answer" class="form-label">Answer</label>
                                    <textarea rows="3" class="form-control" id="answer" placeholder="Answer..." name="answer">{{ $faq->answer }}</textarea>
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
            <div class="modal fade" id="modalDelete{{ $faq->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $faq->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteLabel{{ $faq->id }}">Delete Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this data?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary radius-8" data-bs-dismiss="modal">Cancel</button>
                            <form method="POST" action="{{ route('admin.faqs.destroy', $faq->id) }}">
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
                <h5 class="modal-title" id="modalAddNewLabel">Add New FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.faqs.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                        
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <textarea rows="3" class="form-control" id="question" placeholder="Question..." name="question"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer</label>
                        <textarea rows="3" class="form-control" id="answer" placeholder="Answer..." name="answer"></textarea>
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