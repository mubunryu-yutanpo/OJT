@extends('layouts.app')

@section('title', '商品編集')

@section('contentTitle', '商品編集')

@section('content')
    <x-product_form
        :action="route('product.update', $product->id)"
        :title="$product->title ?? old('title')"
        :description="$product->description ?? old('description')"
        :price="$product->price ?? old('price')"
        :image="$product->image_url ?? asset('images/noimage.png')"
        formClass="p-product-form p-product-edit c-form"
        buttonText="更新する"
    ></x-product_form>
@endsection

@vite('resources/ts/image-preview.ts')
@vite('resources/ts/text-counter.ts')
