@role('Admin')
<button class="btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="editManagementUser" data-id="{{$user->id}}" data-label="{{$user->name}}">>
  <i class="la la-archive"></i>
</button>
<button class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="deleteManagementUser" data-id="{{$user->id}}" data-label="{{$user->name}}">
  <i class="la la-trash-o"></i>
</button>
@endrole