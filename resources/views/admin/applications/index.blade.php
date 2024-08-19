@extends('layouts/sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Employee Applications</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Employee Applications</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">Employee Applications</h5>
            </div>
        </div>
        

        <div class="table-responsive">
            <div id="printbar" style="float:right"></div>
            <br>
            <table id="dataTable" class="table mb-0 align-middle" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Position</th>
                        <th>Date</th>
                        <th>Resume</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($applications as $application)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->email }}</td>
                        <td>{{ $application->phone_number }}</td>
                        <td>{{ optional($application->career)->title }}</td>
                        <td>{{ $application->created_at->format('j M Y') }}</td>
                        <td>
                            @if($application->resume)
                                <div class="d-flex order-actions">
                                    <a href="{{ Storage::url($application->resume) }}" class="text-primary bg-light-primary border-0 me-3" download>
                                        <i class="bx bxs-download"></i>
                                    </a>
                                    <a type="button" class="text-danger bg-light-danger border-0" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $application->id }}"><i class="bx bxs-trash"></i></a> 
                                </div>
                            @else
                                No Resume
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach ($applications as $application)

                <!-- Modal Box Delete -->
                <div class="modal fade" id="modalDelete{{ $application->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel{{ $application->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDeleteLabel{{ $application->id }}">Delete Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this application?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary radius-8" data-bs-dismiss="modal">Cancel</button>
                                <form method="POST" action="{{ route('admin.applications.destroy', $application) }}">
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





@endsection