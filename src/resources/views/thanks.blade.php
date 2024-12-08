@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__container">
    <div class="thanks__background">
        Thank you
    </div>

<div class="thanks__content">
    <div class="thanks__heading">
        <h2>お問い合わせありがとうございました</h2>
    </div>
    <div class="form__button">
        <button class="form__button-submit" type="submit">HOME</button>
    </div>
</div>

@endsection