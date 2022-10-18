@extends('layouts.admin_master')
@section('admincontent')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Dashboard</h6>
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
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
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

                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">DATA SANTRI</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">

                            <div class="table-responsive p-0">

                                <form action="{{ route('santri.update',$edit->id) }}" method="post"
                                    enctype="multipart/form-data" class="align-content-center p-4">
                                    @csrf


                                    <h4>DATA SANTRI</h4>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $edit->name }}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-static my-3 ">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="date_born"
                                            class="form-control @error('date_born') is-invalid @enderror"
                                            value="{{ $edit->date_born }}">
                                        @error('date_born')
                                        <div class=" invalid-feedback">{{ $message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="input-group input-group-static mb-4">
                                        <label for="exampleFormControlSelect1" class="ms-0">Jenis Kelamin</label>
                                        <select name="gender" class="form-control @error('gender') is-invalid @enderror"
                                            id="exampleFormControlSelect1">
                                            <option>{{ $edit->gender }}</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('date_born')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label ">Nomor Telepon</label>
                                        <input type="number" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ $edit->phone }}">
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-static my-3">
                                        <label for="exampleFormControlSelect1">Ukuran Jas</label>
                                        <select class="form-control @error('size_jas') is-invalid @enderror"
                                            name="size_jas" id="exampleFormControlSelect1">
                                            <option>{{ $edit->size_jas }}</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>

                                        </select>
                                        @error('size_jas')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror
                                    </div>



                                    <button type="submit" class="btn btn-primary">Send</button>
                                    <a href="{{ route('santri.index') }}" type="submit"
                                        class="btn btn-success">BATAL</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    @endsection