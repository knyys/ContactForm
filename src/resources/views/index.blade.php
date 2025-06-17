@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form">
    <h2 class="contact-form__heading">Contact</h2>
    <form class="form" action="/" method="post">
        @csrf
        <div class="form__group">
            <table class="contact-form__table">
                <tr>
                    <td class="table__label">お名前<span class="table__label--required">※</span></td>
                    <td class="table__content">
                        <div class="table__content--name">
                            <input type="text" name="first_name" value="{{ old('first_name', $data['first_name'] ?? '') }}" placeholder="例:山田" />
                            <input type="text" name="last_name" value="{{ old('last_name', $data['last_name'] ?? '') }}" placeholder="例:太郎" />
                        </div>
                        <div class="form__error">
                            @error('last_name')
                                <div>{{ $message }}</div>
                            @enderror
                            @error('first_name')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="table__label">性別<span class="table__label--required">※</span></td>
                    <td class="table__content">
                        <div class="table__content--gender">
                            @php
                                $selectedGender = old('gender', $data['gender'] ?? 1);
                            @endphp
                            <span class="gender-label">
                                <input type="radio" name="gender" value="1" {{ $selectedGender == 1 ? 'checked' : '' }}>男性
                            </span>
                            <span class="gender-label">
                                <input type="radio" name="gender" value="2" {{ $selectedGender == 2 ? 'checked' : '' }}>女性
                            </span>
                            <span class="gender-label">
                                <input type="radio" name="gender" value="0" {{ $selectedGender == 0 ? 'checked' : '' }}>その他
                            </span>
                        </div>
                        <div class="form__error">
                            @error('gender')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="table__label">メールアドレス<span class="table__label--required">※</span></td>
                    <td class="table__content">
                        <input type="email" name="email" value="{{ old('email', $data['email'] ?? '') }}" placeholder="例:test@example.com" />
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="table__label">電話番号<span class="table__label--required">※</span></td>
                    <td class="table__content">
                        <div class="table__content--tel">
                            <input type="text" name="tel1" value="{{ old('tel1', $data['tel1'] ?? '') }}" placeholder="080" />
                            <span>-</span>
                            <input type="text" name="tel2" value="{{ old('tel2', $data['tel2'] ?? '') }}" placeholder="1234" />
                            <span>-</span>
                            <input type="text" name="tel3" value="{{ old('tel3', $data['tel3'] ?? '') }}" placeholder="5678" />
                        </div>
                        <div class="form__error">
                            @error('tel1')<div>{{ $message }}</div>@enderror
                            @error('tel2')<div>{{ $message }}</div>@enderror
                            @error('tel3')<div>{{ $message }}</div>@enderror
                        </div>
                    </div>
                </tr>
                <tr>
                    <td class="table__label">住所<span class="table__label--required">※</span></td>
                    <td class="table__content">
                        <input type="text" name="address" value="{{ old('address', $data['address'] ?? '') }}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" />
                        <div class="form__error">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="table__label">建物名</td>
                    <td class="table__content">
                        <input type="text" name="building" value="{{ old('building', $data['building'] ?? '') }}" placeholder="例:千駄ヶ谷マンション101" />
                        <div class="form__error">
                            @error('building')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="table__label">お問い合わせの種類<span class="table__label--required">※</span></td>
                    <td class="table__content">
                    <select class="table__content--select" name="category_id">
            <option value="">選択してください</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    @if(old('category_id', $data['category_id'] ?? '') == $category->id) selected @endif>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
                        <div class="form__error">
                            @error('category_id')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="table__label">お問い合わせ内容<span class="table__label--required">※</span></td>
                    <td class="table__content">
                        <textarea name="detail"  placeholder="例:千駄ヶ谷マンション101" rows="5">{{ old('detail', $data['detail'] ?? '') }}</textarea>
                        <div class="form__error">
                            @error('detail')
                            {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__group-button">
            <button class="confirm-button" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection