@extends('layouts.app')

@section('title', '商品一覧')

@section('contentTitle', '')

@section('content')
    <div class="p-products">
        <h2 class="c-content-title p-products__title">商品一覧</h2>

        @foreach($products as $product)
            <article class="p-product">
                {{--        商品名        --}}
                <h3 class="p-product__title">{{ $product->title }}</h3>
                {{--        商品画像        --}}
                <div class="p-product__image">
                    <img src="{{ $product->image_url }}" alt="" class="p-product__image--item">
                </div>
                {{--        商品説明        --}}
                <p class="p-product__text">{{ $product->description }}</p>
                {{--        投稿者        --}}
                <div class="p-product__user">
                    <p class="p-product__user--name">投稿者： {{ $product->user->name }}</p>
                </div>
                {{--        価格        --}}
                <h4 class="p-product__price">{{ number_format($product->price) }} 円</h4>
                {{--        詳細を確認        --}}
                <div class="p-product__link">
                    <a href="{{ route('product.show', $product->id) }}" class="p-product__link--item">詳細を確認</a>
                </div>
            </article>
        @endforeach
    </div>
@endsection
