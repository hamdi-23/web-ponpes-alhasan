@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    Data Berhasil Diupdate
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if($message = Session::get('added'))
<div class="alert alert-primary alert-dismissible" role="alert">
    Data Berhasil Disimpan
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger ">
    {{-- <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button> --}}
    @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
    @endforeach
</div>
@endif


@if($message = Session::get('delete'))
<div class="alert alert-primary alert-dismissible" role="alert">
    Data Berhasil Dihapus
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif