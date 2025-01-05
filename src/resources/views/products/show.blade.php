@extends('layouts.app')

@section('title', '商品詳細')

@section('contentTitle', '')

@section('content')
    <div class="p-product-detail">
        <h2 class="c-content-title p-product-detail__title">商品詳細</h2>

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
        </article>

        <div class="p-action">
            @if($isMine)
                {{--    編集    --}}
                <div class="p-action__edit">
                    <a href="{{ route('product.edit', $product->id) }}" class="p-action__edit--link">編集する</a>
                </div>

                {{--    削除    --}}
                <form action="{{ route('product.destroy', $product->id) }}" class="p-action__delete" method="POST">
                    @csrf
                    <button class="p-action__delete--button" onclick="alert('本当に削除しますか？')">削除する</button>
                </form>
            @else
                {{--        購入        --}}
                <form action="" class="p-action__purchase" method="POST">
                    @csrf
                    <button class="p-action__purchase--button" onclick="alert('購入します。よろしいですか？')">購入する</button>
                </form>
            @endif
        </div>

    </div>
@endsection
