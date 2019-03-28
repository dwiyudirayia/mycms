@extends('layouts.app')
@section('title')
  Role & Permission
@endsection
@section('headerPage')
  Role & Permission
@endsection
@section('isi')
<div class="row">
  <div class="col-sm-12 col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>Add Role</h3>
      </div>
      <div class="card-body">
        @if(session()->has('successRole'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                {{ session()->get('successRole') }}
        </div>
        @endif
        @if(session()->has('dangerRole'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                {{ session()->get('dangerRole') }}
        </div>
        @endif        
        <form action="{{ url('addRole') }}" method="post">
          {{ csrf_field() }}
          <div class="col-sm-12 m-form__group-sub">
            <label class="form-control-label">Nama Role</label>
            <input type="text" name="name" class="form-control m-input" placeholder="Masukan Nama Role">
          </div>
          <div class="col-xl-12 m--align-right">
            <button type="submit" class="btn btn-danger btn-sm m-btn--pill m-btn--air m-btn--wide m--margin-20">Submit</button>
            <button type="reset" class="btn btn-secondary btn-sm m-btn--wide m-btn--pill m--margin-left-5">Cancel</button>	
          </div>  
        </form>
      </div>      
    </div>
  </div>
  <div class="col-sm-12 col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>Add Permission</h3>
      </div>
      <div class="card-body">
        @if(session()->has('successPermission'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                {{ session()->get('successPermission') }}
        </div>
        @endif
        @if(session()->has('dangerPermission'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                {{ session()->get('dangerPermission') }}
        </div>
        @endif
        <form action="{{ url('addPermission') }}" method="post">
          {{ csrf_field() }}
          <div class="col-sm-12 m-form__group-sub">
            <label class="form-control-label">Nama Permission</label>
            <input type="text" name="name" class="form-control m-input" placeholder="Masukan Nama Permission">
          </div>
          <div class="col-sm-12 m--align-right">
            <button type="submit" class="btn btn-danger btn-sm m-btn--pill m-btn--air m-btn--wide m--margin-20">Submit</button>
            <button type="reset" class="btn btn-secondary btn-sm m-btn--wide m-btn--pill m--margin-left-5">Cancel</button>	
          </div>  
        </form>
      </div>      
    </div>
    </div>  
</div>
@endsection