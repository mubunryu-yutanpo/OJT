@extends('layouts.app')

@section('title', 'ログイン')

@section('contentTitle', 'ログイン')

@section('content')

<section class="p-login">

    <form method="post" action="{{ route('login.store') }}" class="p-login__form c-form">
        @csrf

        {{--    success/error     --}}
        @if(session('success'))
            <div class="p-flash-message p-flash-message--success">
                <p class="p-flash-message__text is-success">{{ session('success') }}</p>
            </div>
        @elseif(session('error'))
            <div class="p-flash-message p-flash-message--error">
                <p class="p-flash-message__text is-error">{{ session('error') }}</p>
            </div>
        @endif

        <div class="p-login__container">
            <label for="email" class="p-login__label c-form__label">メールアドレス</label>
            <input type="email" id="email" name="email" class="p-login__input c-form__input @error('email') is-valid @enderror" value="{{ old('email') }}" required>
        </div>
        @error('email')
            <p class="c-valid-error">{{ $message }}</p>
        @enderror

        <div class="p-login__container">
            <label for="password" class="p-login__label c-form__label">パスワード</label>
            <input type="password" id="password" name="password" class="p-login__input c-form__input @error('password') is-valid @enderror" required>
        </div>
        @error('password')
            <p class="c-valid-error">{{ $message }}</p>
        @enderror

        <div class="p-login__submit c-form__submit">
            <button type="submit" class="p-login__submit--btn c-form__submit--button">ログイン</button>
        </div>

        <div class="p-login__link c-link">
            <a href="{{ route('password_reset') }}" class="p-login__link-item c-link--item">パスワードを忘れた方はこちら</a>
        </div>

        <div class="p-login__link p-login__link--register c-link">
            <a href="{{ route('register') }}" class="p-login__link-item c-link--item">新規登録はこちら</a>
        </div>


    </form>
</section>

@endsection
