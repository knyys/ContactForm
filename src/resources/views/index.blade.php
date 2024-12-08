@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--name">
          <input type="text" name="first_name" value="{{ old('first_name', session('contact.first_name')) }}" placeholder="例:山田" />
          <input type="text" name="last_name" value="{{ old('last_name', session('contact.last_name')) }}" placeholder="例:太郎" />
        </div>
        <div class="form__error">
          @error('name')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--checkbox">
          <input type="radio" name="gender" value="男性"{{ old('gender', session('contact.gender', '男性')) == '男性' ? 'checked' : '' }}>男性
          <input type="radio" name="gender" value="女性"{{ old('gender', session('contact.gender')) == '女性' ? 'checked' : '' }}>女性
          <input type="radio" name="gender" value="その他"{{ old('gender', session('contact.gender')) == 'その他' ? 'checked' : '' }}>その他
        </div>
        <div class="form__error">
          @error('gender')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" value="{{ old('email', session('contact.email')) }}" placeholder="例:test@example.com" />
        </div>
        <div class="form__error">
          @error('email')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <!-- 他のセクションも同様に修正 -->
    <div class="form__group-button">
      <button class="register-button">確認画面</button>
    </div>
  </form>
</div>

@endsection