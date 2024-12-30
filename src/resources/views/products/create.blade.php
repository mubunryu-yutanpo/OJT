@extends('layouts.app')

@section('title', 'アイテム新規登録')

@section('contentTitle', 'アイテム新規登録')

@section('content')

    <x-product_form
        :action="route('product.store')"
        :title="old('title')"
        :description="old('description')"
        :price="old('price')"
        :image="asset('images/noimage.png')"
        formClass="p-product-form p-product-create c-form"
        buttonText="登録する"
    >
    </x-product_form>
@endsection

@vite('resources/ts/image-preview.ts')
@vite('resources/ts/text-counter.ts')
