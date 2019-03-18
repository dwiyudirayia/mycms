@extends('layouts.app')
@section('title')
    Artikel
@endsection
@section('headerPage')
    Daftar Artikel
@endsection
@section('quickAction')
    <ul class="m-nav">
        <li>
            <li class="m-nav__section m-nav__section--first">
                <span class="m-nav__section-text">Quick Actions</span>
            </li>
            <li class="m-nav__item">
                <a href="{{ route('artikel.create') }}" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-share"></i>
                    <span class="m-nav__link-text">Tambah Artikel</span>
                </a>
            </li>
        </li>
    </ul>
@endsection
@section('isi')
<div class="m_datatable" id="artikel-table"></div>
<div class="modal fade" id="modalArtikel" tabindex="-1" role="dialog" aria-labelledby="modalArtikelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArtikelLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="triggerReset">
                <div class="modal-body">
                    <p id="textInfo"></p>
                    <div id="formInfo" class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-height="200" style="overflow: auto; height: 200px;">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Judul</label>
                            <input type="name" class="form-control" name="judul" id="judul" id="exampleFormControlInput1" placeholder="Masukan Nama Judul">
                            <input type="hidden" name="id" id="idParam">
                            <input type="hidden" name="_method" id="method">                        
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-control">
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
            </form>
        </div>
    </div>
</div>
@endsection