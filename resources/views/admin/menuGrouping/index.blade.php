@extends('layouts.app')
@section('title')
    Daftar Menu
@endsection
@section('headerPage')
    Daftar Menu
@endsection
@section('quickAction')
    <ul class="m-nav">
        <li>
            <li class="m-nav__section m-nav__section--first">
                <span class="m-nav__section-text">Quick Actions</span>
            </li>
            <li class="m-nav__item">
                <a href="{{ route('menuGrouping.create') }}" class="m-nav__link">
                    <i class="m-nav__link-icon flaticon-share"></i>
                    <span class="m-nav__link-text">Tambah Menu</span>
                </a>
            </li>
        </li>
    </ul>
@endsection
@section('isi')
<div class="m_datatable" id="menuGrouping-table"></div>
<div class="modal fade" id="modalMenuGrouping" tabindex="-1" role="dialog" aria-labelledby="modalMenuGroupingLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMenuGroupingLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="triggerReset">
                {{csrf_field()}}
                <div class="modal-body">
                    <p id="textInfo"></p>
                    <div id="formInfo" class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-height="200" style="overflow: auto; height: 200px;">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Menu</label>
                            <input type="name" class="form-control" name="nama" id="nama" id="exampleFormControlInput1" placeholder="Masukan Nama Menu">
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