@extends('layouts.app')
@section('title')
    Daftar Users
@endsection
@section('headerPage')
    Daftar Users
@endsection
@section('quickAction')
<ul class="m-nav">
    <li>
        <li class="m-nav__section m-nav__section--first">
            <span class="m-nav__section-text">Quick Actions</span>
        </li>
        <li class="m-nav__item">
            <a href="{{ url('createUsers') }}" class="m-nav__link">
                <i class="m-nav__link-icon flaticon-share"></i>
                <span class="m-nav__link-text">Tambah User</span>
            </a>
        </li>
    </li>
</ul>
@endsection
@section('isi')
<div class="m_datatable" id="usersIndex-table"></div>

<div class="modal fade" id="modalManagementUser" tabindex="-1" role="dialog" aria-labelledby="modalManagementUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalManagementUserLabel"></h5>
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
                            <label for="exampleFormControlInput1">Username</label>
                            <input type="name" class="form-control" name="name" id="name" id="exampleFormControlInput1" placeholder="Masukan Username">
                            <input type="hidden" name="id" id="idParam">
                            <input type="hidden" name="_method" id="method">                        
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                        </div>
                        <div class="form-group">
                            <label for="headerImage">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email Yang Valid">
                        </div>
                        <div class="form-group">
                            <label for="headerImage">Role</label>
                            <div class="m-checkbox-inline" id="updateRoles">                                
                            </div>
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