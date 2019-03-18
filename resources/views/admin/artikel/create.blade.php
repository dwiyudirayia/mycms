@extends('layouts.app')
@section('title')
    Tambah Artikel
@endsection
@section('headerPage')
    Tambah Artikel
@endsection
@section('quickAction')
    <ul class="m-nav">
        <li>
            <li class="m-nav__section m-nav__section--first">
                <span class="m-nav__section-text">Quick Actions</span>
            </li>
            <li class="m-nav__item">
                <a href="{{ route('artikel.index') }}" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-share"></i>
                    <span class="m-nav__link-text">Lihat Artikel</span>
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
<form method="POST" action="{{route('artikel.store')}}" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="name" class="form-control" name="judul" placeholder="Masukan Judul Artikel">
        </div>
        <div class="form-group">
            <label for="">Header Image</label>
            <input type="file" name="headerImage" class="form-control">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control">
                <option value="">--------Pilih Kategori--------</option>
                @foreach ($kategori as $kategoris)
                <option value="{{$kategoris->id}}">{{$kategoris->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Status Artikel</label>
            <select name="status_artikel" id="status_artikel" class="form-control">
                <option value="">--------Pilih Status--------</option>
                <option value="1">Publish</option>
                <option value="0">Draft</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Isi</label>
            <textarea name="isi" id="isi" cols="30" rows="10" class="form-control summernote" placeholder="Masukan Isi Artikel"></textarea>            
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
</form>        

@endsection
