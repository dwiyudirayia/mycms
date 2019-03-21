@role('Admin')
<button class="btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="editMenuGroupingModal" data-id="{{$menuGrouping->id}}" data-label="{{$menuGrouping->nama}}">
  <i class="la la-archive"></i>
</button>
<button class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="deleteMenuGroupingModal" data-id="{{$menuGrouping->id}}" data-label="{{$menuGrouping->nama}}">
  <i class="la la-trash-o"></i>
</button>
@endrole