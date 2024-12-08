@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-nav')
    <ul class="header-nav">
        <li>
          <form action="/register" method="get">
              @csrf 
                <button class="header-nav__button" type="submit">register</button>
          </form>
        </li>
    </ul>
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Login</h2>
    </div>
    <form class="form" action="/login" method="post">
      @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
          </div>
        <div class="form__group-content">
          <div class="form__input--text">
              <input type="email" name="email" placeholder="例:test@example.com" />
          </div>
          <div class="form__error">
              @error('email')
                {{ $message }} 
              @enderror
            </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">パスワード</span>
          </div>
        <div class="form__group-content">
          <div class="form__input--text">
              <input class="content__text" type="password" name="password" placeholder="例::coachtech1106"/>
          </div>
          <div class="form__error">
              @error('password')
                {{ $message }} 
              @enderror
            </div>
        </div>
        <div class="form__group-button">
          <button class="register-button">ログイン</button>
         </form>
        </div>
</div>

@endsection