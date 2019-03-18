@extends('layouts.app')
@section('headerPage')
    Artikel
@endsection
@section('title')
    Semua Postingan
@endsection
@section('isi')
    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
        <div class="m-portlet__head m-portlet__head--fit">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-action">
                    <button type="button" class="btn btn-sm m-btn--pill  btn-brand">Politik</button>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-widget19">
                <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                  <img src="{{ asset('storage/artikel/headerImage/'.$artikel->headerImage)}}" alt="">
                    <h3 class="m-widget19__title m--font-light">
                    {{ $artikel->judul }}
                    </h3>
                <div class="m-widget19__shadow"></div>
            </div>
        <div class="m-widget19__content">
            <div class="m-widget19__header">
                <div class="m-widget19__user-img">
                    <img class="m-widget19__img" src="{{ Storage::get('public/artikel/headerImage/'.$artikel->headerImage) }}" alt="">
                </div>
                <div class="m-widget19__info">
                    <span class="m-widget19__username">
                    {{ $artikel->name }}
                    </span>
                    <br>
                    <span class="m-widget19__time">
                        {{ $artikel->email }}
                    </span>
                </div>
            </div>
            
            <div class="m-widget19__body">
                {!!  substr(strip_tags($artikel->isi), 0, 300) !!}         
            </div>
        </div>
                <div class="m-widget19__action">
                    <a href="{{ URL('/lihatDetailPost/'.$artikel->id )}}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom lihatDetail">Read More</a>
                </div>
            </div>
        </div>
    </div>
@endsection