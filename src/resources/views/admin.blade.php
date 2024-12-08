@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-nav')
    <ul class="header-nav">
        <li>
            <form action="/login" method="post">
              @csrf 
                <button class="header-nav__button" type="submit">logout</button>
            </a>
        </li>
    </ul>
@endsection

@section('content')
<div class="admin-page">
    <div class="admin-page__heading">
        <h2>Admin</h2>
    </div>
    <div class="admin-page__search">
        <form class="admin-page__sarch-form"  action="/search" method="get">
            <input type="text" name="text" placeholder="名前やメールアドレスを入力してください"/>
            <select name="gender">
            <option value="" selected>性別</option>
            <option value="men">男性</option>
            <option value="women" selected>女性</option>
            <option value="other">その他</option>
            </select>
            <select name="detail">
            <option value="" selected>お問い合わせの種類</option>
            <option value="">商品のお届けについて</option>
            <option value="">商品の交換について</option>
            <option value="">商品トラブル</option>
            <option value="">ショップへのお問い合わせ</option>
            <option value="">その他</option>
            </select>
            <input type="date" name="day" />
            <div class="admin-page__button">
            <button class="admin-page__search-button" type="submit">検索</button>
            </div>
        </div>
        </form>
            <form action="" method="get">
            <button class="admin-page__reset-button" type="reset">リセット</button>
         </form>
        </div>
    </div>
    <div class="admin-page__export">
        <form class="admin-page__export-form" >
            <button class="admin-page__export-button">エクスポート</button>
        </form>
        </div>
        <div class="admin-page__pagenation">
           <ul class="pagination">
            @if ($data->onFirstPage())
               <li class="page-item disabled"><span class="page-link">‹</span></li>
            @else
              <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">‹</a></li>
            @endif

            @for ($i = 1; $i <= $data->lastPage(); $i++)
                <li class="page-item {{ $data->currentPage() === $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($data->hasMorePages())
             <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">›</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">›</span></li>
            @endif
            </ul>
        </div>
    
    <div class="admin-page__table">
          <table class="admin-page__table-inner">
            <tr class="admin-page__table--row">
            <th class="admin-page__table--header">お名前</th>
            <th class="admin-page__table--header">性別</th>
            <th class="admin-page__table--header">メールアドレス</th>
            <th class="admin-page__table--header">お問い合わせの種類</th>
            <th class="admin-page__table--header"></th>
            </tr>
            @foreach($contacts as $contact)  
            <tr class="admin-page__table--row">
            <td>{{ $contact['name'] }}</td>
            <td>{{ $contact['gender'] }}</td>
            <td>{{ $contact['email'] }}</td>
            <td>{{ $contact['detail'] }}</td>
            <td><button><a href="">詳細</a></button></td>
            </tr>
            @endforeach
</table>

<div id="detailModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>お問い合わせ内容</h2>
        <table>
            <tr>
                <td>お名前</td>
                <td><span id="modalName"></span></td>
            </tr>
            <tr>
                <td>性別</td>
                <td><span id="modalGender"></span></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><span id="modalEmail"></span></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td><span id="modalTel"></span></td>
            </tr>
            <tr>
                <td>住所</td>
                <td><span id="modalAddress"></span></td>
            </tr>
            <tr>
                <td>建物名</td>
                <td><span id="modalBuilding"></span></td>
            </tr>
            <tr>
                <td>お問い合わせの種類</td>
                <td><span id="modalDetail"></span></td>
            </tr>
            <tr>
                <td>お問い合わせ内容</td>
                <td><span id="modalContent"></span></td>
            </tr>
        </table>
        <form class="delete__button" action="" method="post">
            @csrf
            @method('DELETE')
        <input type="hidden" name="id" value="{{ $contact['id'] }}">
        <button type="submit">削除</button>
        </form>
    </div>
</div>
@endsection