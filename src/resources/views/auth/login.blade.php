@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login-form">
  <h2 class="login-form__heading">Login</h2>
  <form class="form" action="/login" method="post" novalidate>
  @csrf
    <div class="form__group">
      <div class="login-form__content">
        <div class="form__label">メールアドレス</div>
        <div class="form__input">
          <input class="content__text" type="email" name="email" value="{{ old('email') }} "placeholder="例:test@example.com" />
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }} 
          @enderror
        </div>
        <div class="form__label">パスワード</div>
        <div class="form__input">
          <input class="content__text" type="password" name="password" placeholder="例:coachtech1106"/>
        </div>
        <div class="form__error">
          @error('password')
          {{ $message }} 
          @enderror
        </div>
      </div>
    
    <div class="form__group-button">
      <button class="login-button">ログイン</button>
    </div>
    
  </form>        
</div>
@endsection