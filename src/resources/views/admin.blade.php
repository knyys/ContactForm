@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection


@section('content')
<div class="admin-page">
    <h2 class="admin-page__heading">Admin</h2>
    <div class="admin-page__search">
        <form class="admin-page__search-form"  action="/search" method="get">
            <input class=form__input--search type="text" name="text" placeholder="名前やメールアドレスを入力してください"/>
            <select class=form__select--gender name="gender">
                <option value="" selected>性別</option>
                <option value="men">男性</option>
                <option value="women">女性</option>
                <option value="other">その他</option>
            </select>
            <select class=form__select--content name="content">
                <option value="" selected>お問い合わせの種類</option>
                <option value="商品のお届けについて">商品のお届けについて</option>
                <option value="商品の交換について">商品の交換について</option>
                <option value="商品トラブル">商品トラブル</option>
                <option value="ショップへのお問い合わせ">ショップへのお問い合わせ</option>
                <option value="その他">その他</option>
            </select>
            <input class=form__input--day type="date" name="day" />
            <div class="admin-page__button">
                <button class="admin-page__search-button" type="submit">検索</button>
                <button class="admin-page__reset-button" type="reset">リセット</button>
            </div>
        </form>
    </div>
    <div class="admin-page__export">
        <form class="admin-page__export-form" action="/export" method="post">
            <button class="admin-page__export-button" type="submit">エクスポート</button>
    </form>
    <div class="pagination">
        @php
            $currentPage = $contacts->currentPage();
            $lastPage = $contacts->lastPage();
        @endphp

        @if ($currentPage > 1)
            <a href="{{ $contacts->appends(request()->query())->url($currentPage - 1) }}"><</a>
        @else
            <span class="disabled">&laquo;</span>
        @endif

        @for ($i = 1; $i <= $lastPage; $i++)
        @if ($i == $currentPage)
            <a href="{{ $contacts->appends(request()->query())->url($i) }}" class="active">{{ $i }}</a>
        @else
            <a href="{{ $contacts->appends(request()->query())->url($i) }}">{{ $i }}</a>
        @endif
        @endfor

        @if ($currentPage < $lastPage)
            <a href="{{ $contacts->appends(request()->query())->url($currentPage + 1) }}">></a>
        @else
            <span class="disabled">&raquo;</span>
        @endif
    </div>
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
@foreach ($contacts as $contact)
<tr class="admin-page__table--row">
<td>
<span>{{ $contact->last_name }}</span>
<span>{{ $contact->first_name }}</span>
</td>
<td>{{ $contact->gender == 1 ? '男性' : '女性' }}</td>
<td>{{ $contact->email }}</td>
<td>{{ $contact->category->content }}</td>
<td>
<button class="show-modal-btn"
data-id="{{ $contact->id }}"
data-name="{{ $contact->last_name }} {{ $contact->first_name }}"
data-gender="{{ $contact->gender == 1 ? '男性' : '女性' }}"
data-email="{{ $contact->email }}"
data-tel="{{ $contact->tel }}"
data-address="{{ $contact->address }}"
data-building="{{ $contact->building }}"
data-category="{{ $contact->category->content }}"
data-detail="{{ $contact->detail }}"
>詳細</button>
</td>
</tr>
@endforeach
</table>
</div>

<div id="detailModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span id="closeModal" style="cursor:pointer;">&times;</span>
        <table>
            <tr>
                <td class=label>お名前</td>
                <td id="modalName"></td>
            </tr>
            <tr>
                <td class=label>性別</td>
                <td id="modalGender"></td>
            </tr>
            <tr>
                <td class=label>メールアドレス</td>
                <td id="modalEmail"></td>
            </tr>
            <tr>
                <td class=label>電話番号</td>
                <td id="modalTel"></td>
            </tr>
            <tr>
                <td class=label>住所</td>
                <td id="modalAddress"></td>
            </tr>
            <tr>
                <td class=label>建物名</td>
                <td id="modalBuilding"></td>
            </tr>
            <tr>
                <td class=label>お問い合わせの種類</td>
                <td id="modalCategory"></td>
            </tr>
            <tr>
                <td class=label>お問い合わせ内容</td>
                <td id="modalDetail"></td>
            </tr>
        </table>
        <div class="modal-button">
            <button id="delete" class="modal-delete-button">削除</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentContactId = null;

        document.querySelectorAll('.show-modal-btn').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('modalName').textContent = this.dataset.name;
                document.getElementById('modalGender').textContent = this.dataset.gender;
                document.getElementById('modalEmail').textContent = this.dataset.email;
                document.getElementById('modalTel').textContent = this.dataset.tel;
                document.getElementById('modalAddress').textContent = this.dataset.address;
                document.getElementById('modalBuilding').textContent = this.dataset.building;
                document.getElementById('modalCategory').textContent = this.dataset.category;
                document.getElementById('modalDetail').textContent = this.dataset.detail;

                currentContactId = this.dataset.id; // IDを記録

                document.getElementById('detailModal').style.display = 'block';
            });
        });

        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('detailModal').style.display = 'none';
        });

        window.addEventListener('click', function (e) {
            const modal = document.getElementById('detailModal');
            if (e.target == modal) {
                modal.style.display = 'none';
            }
        });

        document.getElementById('delete').addEventListener('click', function () {
            if (!confirm('本当に削除しますか？')) return;
            fetch(`/admin/${currentContactId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
            })
            .then(res => {
                if (!res.ok) throw new Error('削除に失敗しました');
                alert('削除しました');
                document.getElementById('detailModal').style.display = 'none';
                location.reload(); // もしくは、行削除でもOK
            })
            .catch(err => {
                alert(err.message);
            });
        });
    });
</script>
@endsection