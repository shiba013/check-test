@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__inner">
        <div class="content__title">
            <h2 class="content__title-logo">Admin</h2>
        </div>
    </div>

<div class="form">
    <form action="/search" method="get" class="search-form">
        @csrf
        <div class="search-form__item">
            <input type="text" name="keyword" value="{{ old('keyword') }}" class="search-form__item-group--key" placeholder="名前やメールアドレスを入力してください">
            <select name="gender" class="search-form__item-group">
                <option value="" selected>性別</option>
                <option value="1" {{ old('gender') == 1 || old('gender') == 1 ? 'selected' : '' }}>男性</option>
                <option value="2" {{ old('gender') == 2 || old('gender') == 2 ? 'selected' : '' }}>女性</option>
                <option value="3" {{ old('gender') == 3 || old('gender') == 3 ? 'selected' : '' }}>その他</option>
            </select>
            <select name="category_id" class="search-form__item-group">
                <option value="" selected hidden>選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id }}>{{ $category->content }}</option>
                @endforeach
            </select>
            <input type="date" name="created_at" class="search-form__item-group--data" value="{{ request('created_at') }}">
        </div>
        <div class="search-form__button">
            <input type="submit" class="search-form__button-submit" value="検索">
            <input type="submit" class="search-form__button-reset" value="リセット" name="reset">
        </div>
    </form>

    <div class="function">
        <form action="/export?" method="post" class="function-form">
            @csrf
            <input type="submit" value="エクスポート" class="function-button">
        </form>
        {{ $contacts->links('vendor.pagination.bootstrap-4') }}
    </div>

    <div class="table">
        <table class="table__inner">
            <tr class="table__row">
                <th class="table__header">お名前</th>
                <th class="table__header">性別</th>
                <th class="table__header">メールアドレス</th>
                <th class="table__header">お問い合わせの種類</th>
                <th class="table__header"></th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="table__row">
                <td class="table__item">{{ $contact->first_name }}&nbsp; &nbsp;{{ $contact->last_name }}</td>
                <td class="table__item">
                    @if($contact->gender == 1)
                    男性
                    @elseif($contact->gender == 2)
                    女性
                    @else
                    その他
                    @endif
                </td>
                <td class="table__item">{{ $contact->email }}</td>
                <td class="table__item">{{ $contact->category->content }}</td>
                <td class="table__item">
                    <a href="#{{ $contact->id }}" class="open-button">詳細</a>
                </td>
            </tr>

            <div class="modal" id="{{ $contact->id }}">
                <a href="#!" class="popover"></a>
                <div class="modal__inner">
                    <div class="modal__content">
                        <form action="/delete" method="post" class="delete-form">
                            @method('delete')
                            @csrf
                            <div class="delete-form__item">
                                <label for="" class="delete-form__label">お名前</label>
                                <p>{{ $contact->first_name }}{{ $contact->last_name }}</p>
                            </div>
                            <div class="delete-form__item">
                                <label for="" class="delete-form__label">性別</label>
                                <p>
                                    @if($contact->gender == 1)
                                    男性
                                    @elseif($contact->gender == 2)
                                    女性
                                    @else
                                    その他
                                    @endif
                                </p>
                            </div>
                            <div class="delete-form__item">
                                <label for="" class="delete-form__label">メールアドレス</label>
                                <p>{{ $contact->email }}</p>
                            </div>
                            <div class="delete-form__item">
                                <label for="" class="delete-form__label">電話番号</label>
                                <p>{{ $contact->tell }}</p>
                            </div>
                            <div class="delete-form__item">
                                <label for="" class="delete-form__label">住所</label>
                                <p>{{ $contact->address }}</p>
                            </div>
                            <div class="delete-form__item">
                                <label for="" class="delete-form__label">建物名</label>
                                <p>{{ $contact->building }}</p>
                            </div>
                            <div class="delete-form__item">
                                <label for="" class="delete-form__label">お問い合わせの種類</label>
                                <p>{{ $contact->category->content }}</p>
                            </div>
                            <div class="delete-form__item">
                                <label for="" class="delete-form__label">お問い合わせ内容</label>
                                <p>{{ $contact->detail }}</p>
                            </div>
                            <input type="hidden" name="id" value="{{ $contact->id }}">
                            <input type="submit" value="削除" class="delete-form__button">
                        </form>
                    </div>
                    <a href="#" class="close">×</a>
                </div>
            @endforeach
        </table>
    </div>
</div>
@endsection