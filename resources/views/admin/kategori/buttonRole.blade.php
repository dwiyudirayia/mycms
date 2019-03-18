@role('Admin')
@if( $kategori->status_kategori === 0)
<button class="btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="editKategoriModal" data-id="{{$kategori->id}}" data-label="{{$kategori->nama}}">>
  <i class="la la-archive"></i>
</button>
<button class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="deleteKategoriModal" data-id="{{$kategori->id}}" data-label="{{$kategori->nama}}">
  <i class="la la-trash-o"></i>
</button>
<button class="btn btn-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="gantiStatus" data-id="{{$kategori->id}}" data-label="{{$kategori->nama}}">
  <i class="la la-toggle-on"></i>
</button>
@else
<button class="btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="editKategoriModal" data-id="{{$kategori->id}}" data-label="{{$kategori->nama}}">>
  <i class="la la-archive"></i>
</button>
<button class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="deleteKategoriModal" data-id="{{$kategori->id}}" data-label="{{$kategori->nama}}">
  <i class="la la-trash-o"></i>
</button>
<button class="btn btn-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="gantiStatus" data-id="{{$kategori->id}}" data-label="{{$kategori->nama}}">
  <i class="la la-toggle-off"></i>
</button>
@endif
@endrole