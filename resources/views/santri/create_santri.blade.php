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

                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">DATA SANTRI</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">

                            <div class="table-responsive p-0">
                                {{-- @include('layouts.notif') --}}

                                <form action="{{ route('santri.store') }}" method="post" enctype="multipart/form-data" class="align-content-center p-4">
                                    @csrf

                                    <h4>DATA SANTRI</h4>
                                    {{-- <div class="input-group input-group-outline my-3">
                                        <label class="form-label">NIS</label>
                                        <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis') }}">
                                    @error('nis')
                                    <div class="invalid-feedback">{{ $message}}</div>
                                    @enderror
                            </div> --}}

                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-static my-3 ">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="date_born" class="form-control @error('date_born') is-invalid @enderror" value="{{ old('date_born') }}">

                                @error('date_born')
                                <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>

                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Jenis Kelamin</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="exampleFormControlSelect1">
                                    <option>--Pilih--</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>

                                </select>
                                @error('gender')
                                <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>

                            <div class="input-group input-group-outline my-3">
                                <label class="form-label ">Nomor Telepon</label>
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                @error('phone')
                                <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Tingkat
                                    Pendidikan</label>
                                <select class="form-control" name="school" id="exampleFormControlSelect1">
                                    <option value="{{ old('school') }}">--pilih--</option>
                                    <option value="sd/mi">SD/MI</option>
                                    <option value="smp/mts">SMP/MTS</option>
                                    <option value="sma/ma/smk">SMA/MA/SMK</option>
                                    <option value="others">LAINNYA</option>
                                </select>
                            </div>
                            <div class="input-group input-group-static my-3">
                                <label for="exampleFormControlSelect1">Ukuran Jas</label>
                                <select class="form-control @error('size_jas') is-invalid @enderror" name="size_jas" id="exampleFormControlSelect1">
                                    <option>--pilih--</option>
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
                            <div class="input-group input-group-outline my-3 ">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                @error('address')
                                <div class="invalid-feedback">{{ $message}}</div>
                                @enderror
                            </div>

                            <h4>DATA ORANG TUA</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Nama
                                            Ayah</label>
                                        <input type="text" class="form-control @error('father') is-invalid @enderror" value="{{ old('father') }}" name="father">
                                        @error('father')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label ">Nama
                                            Ibu</label>
                                        <input type="text" class="form-control @error('mother') is-invalid @enderror" value="{{ old('mother') }}" name="mother">
                                        @error('mother')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="exampleFormControlSelect1">Pekerjaan
                                            Ayah</label>
                                        <select name="father_job" class="form-control @error('father_job') is-invalid @enderror" id="exampleFormControlSelect1">
                                            <option>--Pilih--</option>
                                            @foreach($datajobs as $job)
                                            <option value="{{ $job->name_job}}">{{ $job->name_job}}</option>
                                            @endforeach
                                        </select>
                                        @error('father_job')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="exampleFormControlSelect1">Pekerjaan
                                            Ibu</label>
                                        <select name="mother_job" class="form-control @error('mother_job') is-invalid @enderror" id="exampleFormControlSelect1">
                                            <option>--Pilih--</option>
                                            @foreach($datajobs as $job)
                                            <option value="{{ $job->name_job}}">{{ $job->name_job}}</option>

                                            @endforeach
                                        </select>
                                        @error('mother_job')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label ">No Telepon Orang Tua</label>
                                        <input type="number" class="form-control  @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" name="phone_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                        @error('phone_number')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label ">Alamat</label>
                                        <input type="text" class="form-control  @error('address1') is-invalid @enderror" value="{{ old('address1') }}" name="address1">
                                        @error('address1')
                                        <div class="invalid-feedback">{{ $message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                            <a href="{{ route('santri.index') }}" type="submit" class="btn btn-success">BATAL</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    @endsection
