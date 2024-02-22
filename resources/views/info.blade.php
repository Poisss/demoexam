@extends('main')
@section('title','info')
@section('content')
    <div class="div-2" class="m-10">
        <div class="logo">
            <img src="{{asset('public/storage/AOVO S1 New.png')}}" alt="">
        </div>
        <h1>Copy Star</h1>
    </div>
    <h3>Наш девиз копирую быстро копирую мощно в надежде на успех</h2>
    <h1 class="m-10">Новинки компании</h2>
        <div class="catalog">
            @foreach ($data as $item)
                <a href="/products/{{$item->id}}" class="catalog-item">
                    <div class="catalog-item-img">
                        <img src="{{asset('public/storage/'.$item->image)}}" alt="">
                    </div>
                    <h3>{{$item->title}}</h3>
                </a>
            @endforeach
        </div>
@endsection
