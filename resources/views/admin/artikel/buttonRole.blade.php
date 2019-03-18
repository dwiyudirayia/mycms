@role('Admin')
@if( $artikel->status_artikel === 0)

<button class="btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="editArtikelModal" data-id="{{$artikel->id}}" data-label="{{$artikel->judul}}">
  <i class="la la-archive"></i>
</button>
<button class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="deleteArtikelModal" data-id="{{$artikel->id}}" data-label="{{$artikel->judul}}">
  <i class="la la-trash-o"></i>
</button>
<button class="btn btn-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="gantiStatus" data-id="{{$artikel->id}}" data-label="{{$artikel->judul}}">
  <i class="la la-toggle-on"></i>
</button>
<a href="{{ url('artikel/'.$artikel->id )  }}" class="btn btn-metal m-btn m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-file-archive-o"></i></a>
@else
<button class="btn btn-primary m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="editArtikelModal" data-id="{{$artikel->id}}" data-label="{{$artikel->judul}}">
  <i class="la la-archive"></i>
</button>
<button class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="deleteArtikelModal" data-id="{{$artikel->id}}" data-label="{{$artikel->judul}}">
  <i class="la la-trash-o"></i>
</button>
<button class="btn btn-warning m-btn m-btn--icon m-btn--icon-only m-btn--pill" id="gantiStatus" data-id="{{$artikel->id}}" data-label="{{$artikel->judul}}">
  <i class="la la-toggle-off"></i>
</button>
<a href="{{ url('artikel/'.$artikel->id )  }}" class="btn btn-metal m-btn m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-file-archive-o"></i></a>
@endif
@endrole