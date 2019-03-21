@extends('layouts.app')
@section('title')
    Tambah Menu
@endsection
@section('headerPage')
    Tambah Menu
@endsection
@section('quickAction')
    <ul class="m-nav">
        <li>
            <li class="m-nav__section m-nav__section--first">
                <span class="m-nav__section-text">Quick Actions</span>
            </li>
            <li class="m-nav__item">
                <a href="{{ route('menuGrouping.index') }}" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-share"></i>
                    <span class="m-nav__link-text">Lihat Menu</span>
                </a>
            </li>
        </li>
    </ul>
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
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        {{ session()->get('message') }}
</div>
@endif
<form method="POST" action="{{route('menuGrouping.store')}}">
    @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="name" class="form-control" name="nama" placeholder="Masukan Nama Menu">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
</form>        

@endsection
