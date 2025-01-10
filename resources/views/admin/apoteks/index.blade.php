@extends('layouts/sidebar')

@section('admin')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Apotek</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Apotek</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="font-weight-bold mb-0">Apotek</h5>
            </div>
        </div>
        

        <div class="table-responsive">
            <div id="printbar" style="float:right"></div>
            <br>
            <table id="dataTable" class="table mb-0 align-middle" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>PIC</th>
                        <th>Nomor Telp</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($apoteks as $apotek)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $apotek->name }}</td>
                        <td>{{ $apotek->address }}</td>
                        <td>{{ $apotek->pic }}</td>
                        <td>{{ $apotek->phone_number }}</td>
                        <td>{{ $apotek->created_at->format('j M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>





@endsection