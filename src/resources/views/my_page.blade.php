@extends('layouts.app')

@section('title', 'マイページ')

@section('contentTitle', 'マイページ')

@section('content')
    @if(session('success'))
        <div class="p-flash-message p-flash-message--success">
            <p class="p-flash-message__text is-success">{{ session('success') }}</p>
        </div>
    @elseif(session('error'))
        <div class="p-flash-message p-flash-message--error">
            <p class="p-flash-message__text is-error">{{ session('error') }}</p>
        </div>
    @endif
@endsection
