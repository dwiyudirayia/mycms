@extends('layouts.app')
@section('title')
    Tambah User
@endsection
@section('headerPage')
    Tambah User
@endsection
@section('isi')
@if ($errors->any())    
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>                
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ url('oprationUsers') }}">
    {{csrf_field()}}
    <div class="col-sm-12 m-form__group-sub">
        <label class="form-control-label">Nama</label>
        <input type="text" name="name" class="form-control m-input" placeholder="Masukan Nama">        
    </div>
    <div class="col-sm-12 m-form__group-sub">
        <label class="form-control-label">Email</label>
        <input type="text" name="email" class="form-control m-input" placeholder="Masukan Email">        
    </div>
    <div class="col-sm-12 m-form__group-sub">
        <label class="form-control-label">Password</label>
        <input type="password" name="password" class="form-control m-input" placeholder="Masukan Password">                
    </div>
    <div class="col-sm-12 m-form__group-sub">
        <label class="form-control-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control m-input" placeholder="Konfirmasi Password">                
    </div>        
    <div class="col-xl-12 m--align-right">
        <button type="submit" class="btn btn-danger btn-sm m-btn--pill m-btn--air m-btn--wide">Submit</button>
        <button type="reset" class="btn btn-secondary btn-sm m-btn--wide m-btn--pill m--margin-left-5">Cancel</button>	
    </div>
</form>
@endsection
