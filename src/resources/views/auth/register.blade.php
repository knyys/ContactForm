@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-form">
  <h2 class="register-form__heading">Register</h2>
  <form class="form" action="/register" method="post">
  @csrf
  <div class="form__group">
    <div class="register-form__content">
      <div class="form__label">お名前</div>
      <div class="form__input">
        <input class="content__text" type="text" name="name" value="{{ old('name') }}" placeholder="例:山田 太郎" />
      </div>
      <div class="form__error">
        @error('name')
        {{ $message }} 
        @enderror
      </div>
      <div class="form__label">メールアドレス</div>
      <div class="form__input">
        <input class="content__text" class="content__text" type="text" name="email" value="{{ old('email') }}" placeholder="例:test@example.com"/>
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
  <button class="register-button" type="submit">登録</button>
  </div> 
  </div>
  </form>
</div>
@endsection