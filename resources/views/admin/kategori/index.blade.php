@extends('layouts.app')
@section('title')
    Daftar Kategori
@endsection
@section('headerPage')
    Daftar Kategori
@endsection
@section('quickAction')
    <ul class="m-nav">
        <li>
            <li class="m-nav__section m-nav__section--first">
                <span class="m-nav__section-text">Quick Actions</span>
            </li>
            <li class="m-nav__item">
                <a href="{{ route('kategori.create') }}" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-share"></i>
                    <span class="m-nav__link-text">Tambah Kategori</span>
                </a>
            </li>
        </li>
    </ul>
@endsection
@section('isi')
<div class="m_datatable" id="kategori-table"></div>

<div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="modalKategoriLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKategoriLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="textInfo"></p>
                    <div id="formInfo">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Kategori</label>
                            <input type="name" class="form-control" name="nama" id="nama" id="exampleFormControlInput1" placeholder="Masukan Nama Kategori">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" id="idParam">
                            <input type="hidden" name="_method" id="method">                            
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="buttonSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editKategoriModal" tabindex="-1" role="dialog" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKategoriModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="PUT" action="{{route('kategori.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Kategori</label>
                        <input type="name" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="Masukan Nama Kategori">
                        <input type="hidden" name="_method" id="method">
                        <input type="hidden" name="status_kategori" id="status_kategori">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>                
            </div>
        </div>
    </div>
</div>
@endsection