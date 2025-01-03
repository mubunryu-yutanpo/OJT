@extends('layouts.app')

@section('title', '商品一覧')

@section('contentTitle', '')

@section('content')
    <div class="">
        <h2 class="">商品一覧</h2>

        @foreach($products as $product)
            <article class="">
                <h3 class="">{{ $product->title }}</h3>
                <div class="">
                    <img src="{{ $product->image_url }}" alt="" class="">
                </div>
                <p class="">{{ $product->description }}</p>

                <div class="">
                    <p class="">投稿者： {{ $product->user->name }}</p>
                </div>

                <h4 class="">{{ number_format($product->price) }} 円</h4>
                <a href="{{ route('product.show', $product->id) }}" class="">詳細を確認</a>
            </article>
        @endforeach
    </div>
@endsection
