@extends('layouts.admin_master')
@section('admincontent')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data guru</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Data Santri</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Type here...</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                            <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">

                                <h6 class="text-white text-capitalize ps-3">DATA GURU</h6>
                            </div>
                        </div>
                        @include('layouts.notif')
                        <div class="p-4"><a href="{{ route('guru.create') }}" type="button" class="btn btn-success ">TAMBAH
                                DATA +</a>

                            <div class="card-body px-0 ">
                                @csrf
                                @method('put')
                                <div class="table-responsive ">
                                    <table id="#datatable" class="table table-striped" style="width:100%">

                                        <thead>
                                            <tr>
                                                <th class="  opacity-20">
                                                    NO</th>
                                                <th class=" opacity-20">
                                                    NAMA</th>
                                                <th class=" opacity-20">
                                                    PEKERJAAN</th>
                                                <th class="  opacity-20">
                                                    NOMOR TELEPON</th>
                                                <th class=" opacity-20">
                                                    ALAMAT</th>
                                                <th class=" opacity-20">
                                                    AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            {{-- @foreach ($dataGuru as $index => $row) --}}
                                            @foreach ($dataGuru as $index => $row)
                                            <tr align=" center">
                                                <td>
                                                    <p class=" ">{{ $no++ }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class=" ">{{ $row->name }}</p>
                                                </td>

                                                <td>
                                                    <p class=" ">{{ $row->name_job }}</p>
                                                </td>
                                                <td>
                                                    <p class=" ">{{ $row->phone }}</p>
                                                </td>
                                                <td>
                                                    <p class=" ">{{ $row->address }}</p>
                                                </td>
                                                <td class=" d-lg-inline-flex">

                                                    <a href="{{ route('guru.edit', $row->id) }}" type="button" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    &nbsp;
                                                    <a href="{{ route('guru.delete', $row->id) }}" type=" button" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->name }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    &nbsp;

                                                    <form action="">
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exLargeModal-{{ $row->id }}">
                                                            <i class="fa fa-info" aria-hidden="true"></i></button>
                                                    </form>



                                                </td>
                                                @foreach ($dataGuru as $guru)
                                                <div class="modal fade" id="exLargeModal-{{ $guru->id }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel4">
                                                                    DETAIL
                                                                    SANTRI
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="table-responsive p-3">
                                                                <form class="align-content-center p-4">
                                                                    <h4>DATA SANTRI</h4>
                                                                    <div class="input-group-static my-3">
                                                                        <label class="form-label">Nama</label>
                                                                        <input type="text" class="form-control p-2" value=" {{ $guru->name }}" aria-selected="true" readonly>
                                                                    </div>

                                                                    <div class=" input-group-static my-3 ">
                                                                        <label>Pekerjaan</label>
                                                                        <input type="text" class="form-control p-2" value="{{ $guru->name_job }}" readonly>
                                                                    </div>
                                                                    <div class="input-group-static my-3">
                                                                        <label class="form-label">Jenis
                                                                            Kelamin</label>
                                                                        <input type="text" class="form-control p-2" value="{{ $guru->gender }}" readonly>
                                                                    </div>
                                                                    <div class="input-group my-3 ">
                                                                        <label class="form-label">Nomor
                                                                            Telepon</label>
                                                                        <input type="text" class="form-control p-2" value="{{ $guru->phone }}" readonly>
                                                                    </div>

                                                                    <div class="input-group-static my-3">
                                                                        <label class="form-label">Ukuran
                                                                            Jas</label>
                                                                        <input type="text" class="form-control p-2" value="{{ $row->address }}" readonly>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                </div>

                            </div>
                        </div>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    {{-- {{$dataGuru->links('pagination::bootstrap-4') }} --}}

                </div>
            </div>
        </div>
    </div>

    </div>

    </div>

    {{-- <script src="{{ asset('template/assets/js/plugins/datatables.js') }}"></script> --}}
    {{-- <script type="text/css"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable('');
        });

    </script>

    @endsection
