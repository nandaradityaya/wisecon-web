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
        <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-success"><i class="bx bxs-check-circle"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-success">Success</h6>
                    <div>Congrats! you successfully add new data</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <p class="mb-0 mt-3 text-black d-flex align-items-center justify-content-center d-lg-none d-md-block d-sm-block"><i class="lni lni-whatsapp text-success me-2"></i>Credit: 816,247 (Can Invite 1484 People)</p>
        <div class="table-responsive">
            <div id="printbar" style="float:right"></div>
            <br>
            <table id="service" class="table mb-0 align-middle" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Thumbnail</th>
                        <th>excerpt</th>
                        <th>Body</th>
                        <th>Key Feature</th>
                        <th>Our Approaches</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>We Are a Creative IT Solutions Agency</td>
                        <td>slug</td>
                        <td>
                            <img src="assets/images/bg-themes/1.png" width="100" alt="">
                        </td>
                        <td>Preparing for your success with the best IT Services</td>
                        <td>We deliver exceptional solutions to meet all your needs with excellence and dedication</td>
                        <td>Key Features</td>
                        <td>Our Approaches</td>
                        <td>
                            <div class="d-flex order-actions">
                                <a type="button" class="text-primary bg-light-primary border-0 me-3" data-bs-toggle="modal" data-bs-target="#modalAddNew"><i class="bx bxs-edit"></i></a>
                                <a type="button" class="text-danger bg-light-danger border-0" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="bx bxs-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            <div class="modal-body">
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Title...">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">slug</label>
                    <input type="text" class="form-control" id="slug" placeholder="slug...">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Thumbnail</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="excerpt" class="form-label">Excerpt</label>
                    <input type="text" class="form-control" id="excerpt" placeholder="Excerpt...">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <input type="text" class="form-control" id="body" placeholder="Body...">
                </div>
                <div class="mb-3">
                    <label for="keyFeatures" class="form-label">Key Features</label>
                    <textarea class="form-control" id="keyFeatures" placeholder="Key Features..." rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="ourApproaches" class="form-label">Our Approaches</label>
                    <textarea class="form-control" id="ourApproaches" placeholder="Our Approaches..." rows="3"></textarea>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary radius-6"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary radius-6">Save</button>
            </div>
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