@extends('layouts.app')

@section('title', 'ユーザー新規登録')

@section('contentTitle', 'ユーザー新規登録')

@section('content')

    <section class="p-register">

        <form method="post" action="{{ route('register.store') }}" class="p-register__form c-form">
            @if(session('error'))
                <div class="p-flash-message p-flash-message--error">
                    <p class="p-flash-message__text is-error">{{ session('error') }}</p>
                </div>
            @endif

            @csrf

            <div class="p-register__container">
                <label for="name" class="p-register__label c-form__label">名前</label>
                <input type="text" id="name" name="name" class="p-register__input c-form__input" value="{{ old('name') }}" required>
            </div>
            @error('name')
                <p class="c-valid-error">{{ $message }}</p>
            @enderror

            <div class="p-register__container">
                <label for="email" class="p-register__label c-form__label">メールアドレス</label>
                <input type="email" id="email" name="email" class="p-register__input c-form__input @error('email') is-valid @enderror" value="{{ old('email') }}" required>
            </div>
            @error('email')
                <p class="c-valid-error">{{ $message }}</p>
            @enderror

            <div class="p-register__container">
                <label for="password" class="p-register__label c-form__label">パスワード</label>
                <input type="password" id="password" name="password" class="p-register__input c-form__input @error('password') is-valid @enderror" required>
            </div>
            @error('password')
                <p class="c-valid-error">{{ $message }}</p>
            @enderror

            <div class="p-register__container">
                <label for="password_confirmation" class="p-register__label c-form__label">パスワード(再入力)</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="p-register__input c-form__input @error('password_confirmation') is-valid @enderror" required>
            </div>
            @error('password_confirmation')
                <p class="c-valid-error">{{ $message }}</p>
            @enderror

            <div class="p-register__submit c-form__submit">
                <button type="submit" class="p-register__submit--btn c-form__submit--button">登録する</button>
            </div>

            <div class="p-register__link p-register__link--register c-link">
                <a href="{{ route('login') }}" class="p-register__link-item c-link--item">ログインはこちら</a>
            </div>


        </form>
    </section>
@endsection
