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
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Santri</li>
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

                            <div class="bg-gradient-info shadow-light border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">DATA SANTRI</h6>
                            </div>
                        </div>
                        @include('layouts.notif')
                        <div class="p-4"><a href="{{ route('santri.create') }}" type="button" class="btn btn-success ">TAMBAH
                                DATA +</a>

                            <div class="card-body px-0 pb-2">
                                @csrf
                                @method('put')
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr align="center">
                                                <th class="  opacity-20">
                                                    NO</th>
                                                <th class=" opacity-20">
                                                    NIS</th>

                                                <th class=" opacity-20">
                                                    NAMA</th>
                                                <th class=" opacity-20">
                                                    TANGGAL LAHIR</th>
                                                <th class="text-center  opacity-20">
                                                    JENIS KELAMIN</th>
                                                <th class="text-center  opacity-20">
                                                    NOMOR TELEPON</th>

                                                <th class="text-center  opacity-20">
                                                    UKURAN JAS</th>
                                                <th class="text-center  opacity-20">
                                                    AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no =1;
                                            @endphp
                                            @foreach($dataSantri as $row)


                                            <tr align="center">
                                                <td>
                                                    <p class=" font-weight-bold ">{{$no++}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class=" font-weight-bold ">{{ $row->nis
                                                        }}</p>
                                                </td>

                                                <td>
                                                    <p class=" font-weight-bold ">{{ $row->name
                                                        }}</p>
                                                </td>
                                                <td>
                                                    <p class=" font-weight-bold mb-0">{{ $row->date_born
                                                        }}</p>
                                                </td>
                                                <td>
                                                    <p class=" font-weight-bold mb-0">{{ $row->gender
                                                        }}</p>
                                                </td>

                                                <td>
                                                    <p class=" font-weight-bold ">{{ $row->phone
                                                        }}</p>
                                                </td>
                                                <td>
                                                    <p class=" font-weight-bold mb-0">{{ $row->size_jas
                                                        }}</p>
                                                </td>
                                                <td class="d-flex" style="align-content:flex-start">

                                                    <a href=" {{ route('santri.edit',$row->nis) }}" type="button" class="btn bg-gradient-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    &nbsp;
                                                    <a href="{{ route('santri.delete',$row->nis) }}" type=" button" class="btn btn-danger delete" data-id="{{ $row->id}}" data-nama="{{ $row->name}}"><i class="fa fa-trash" aria-hidden="true"></i></a>


                                                    &nbsp;

                                                    <form action="">
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exLargeModal-{{ $row->id }}">
                                                            <i class="fa fa-info" aria-hidden="true"></i></a>
                                                    </form>



                                                </td>
                                                @foreach($dataSantri as $santri)
                                                <div class="modal fade" id="exLargeModal-{{ $santri->id }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel4">DETAIL
                                                                    SANTRI
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="table-responsive p-3" style="background-image: image('template/assets/img/ponpes.jpeg')">




                                                                <form class=" align-content-center p-4" style="background-color: aliceblue">
                                                                    <h4 align="center">DATA SANTRI</h4>
                                                                    <div class=" input-group-static">
                                                                        <label class="font-weight-bold mb-0">
                                                                            <h5>Nama</h5>
                                                                        </label>
                                                                        <input type=" date" class="form-control p-2" value="{{ $santri->name }}" readonly>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="font-weight-bold mb-0">
                                                                                    <h5>Tanggal Lahir</h5>
                                                                                </label>

                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->date_born }}" aria-selected="true" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="form-label">Jenis Kelamin</label>
                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->gender }}" aria-selected="true" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="form-label">Nomor Telepon</label>
                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->phone }}" aria-selected="true" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="form-label">Ukuran Jas</label>
                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->size_jas }}" aria-selected="true" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class=" input-group-static my-2 mb-3">
                                                                        <label>Alamat</label>
                                                                        <input type=" date" class="form-control p-2" value="{{ $santri->address }}" readonly>
                                                                    </div>
                                                                    <h4>DATA ORANG TUA</h4>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="form-label">Nama Ayah</label>
                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->father }}" aria-selected="true" readonly>


                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="form-label">Nama Ibu</label>

                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->mother }}" aria-selected="true" readonly>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="form-label">Pekerjaan Ayah</label>
                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->father_job }}" aria-selected="true" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="form-label">Pekerjaan Ibu</label>

                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->mother_job }}" aria-selected="true" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="form-label">Nomor Telepon Orang Tua</label>
                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->phone_number }}" aria-selected="true" readonly>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="input-group-static my-2">
                                                                                <label class="form-label">Alamat</label>

                                                                                <input type="text" class="form-control p-2" value=" {{ $santri->address1 }}" aria-selected="true" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    {{-- <div class="input-group-static my-2">
                                                                        <label class="form-label">Jenis Kelamin</label>
                                                                        <input type="text" class="form-control p-2" value="{{ $santri->phone_number }}" readonly>
                                                            </div> --}}
                                                            {{--
                                                            <div class="input-group my-3 ">
                                                                <label class="form-label">Nomor Telepon</label>
                                                                <input type="text" class="form-control p-2" value="{{ $santri->father_job }}" readonly>
                                                        </div>

                                                        <div class="input-group-static my-3">
                                                            <label class="form-label">Ukuran Jas</label>
                                                            <input type="text" class="form-control p-2" value="{{ $row->size_jas }}" readonly>
                                                        </div> --}}



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
            {{-- {{$dataSantri->links('pagination::bootstrap-4') }} --}}


        </div>
    </div>
    </div>
    </div>

    </div>

    </div>


    @endsection
