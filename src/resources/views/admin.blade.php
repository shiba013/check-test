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
    <form action="" method="get" class="search-form">
        @csrf
        <div class="search-form__item">
            <input type="text" name="keyword" value="{{ old('keyword') }}" class="search-form__item-group" placeholder="名前やメールアドレスを入力してください">
            <select name="gender" class="search-form__item-group">
                <option value="" selected>性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
            <select name="category_id" class="search-form__item-group">
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input type="date" name="data" class="search-form__item-group">
            <div class="search-form__button">
                <button type="submit" class="search-form__button-submit">検索</button>
            </div>
            <div class="search-form__reset-button">
                <button type="reset" class="search-form__button-reset">リセット</button>
            </div>
        </div>
    </form>

    <div class="function">
        <button type="submit" class="function-button">エクスポート</button>
    </div>

    <div class="table">
        <table class="table__inner">
            <tr class="table__row">
                <th class="table__header">
                    <span class="table__header-span">お名前</span>
                    <span class="table__header-span">性別</span>
                    <span class="table__header-span">メールアドレス</span>
                    <span class="table__header-span">お問い合わせの種類</span>
                </th>
            </tr>
            <tr class="table__row">
                <td class="table__item">
                    <div class="table__item-data">
                        a
                    </div>
                    <div class="modal">
                        <button class="open-button" popovertarget="detail" popovertargetaction="show">詳細</button>
                        <div id="detail" popover>
                            <p>選択内容を表示したい...</p>
                            <p>モーダルウインドウ外を押すと画面消える</p>
                            <form action="" method="post" class="delete-form">
                                @method('delete')
                                @csrf
                                <div class="delete-form__button">
                                    <input type="hidden" name="id" value="">
                                    <button type="submit" popovertarget="detail" popovertargetaction="hide" >削除</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="table__row">
                <td class="table__item">
                    <div class="table__item-data">
                        b
                    </div>
                    <div class="modal">
                        <button class="open-button" popovertarget="detail" popovertargetaction="show">詳細</button>
                        <div id="detail" popover>
                            <p>選択内容を表示したい...</p>
                            <p>モーダルウインドウ外を押すと画面消える</p>
                            <form action="" method="post" class="delete-form">
                                @method('delete')
                                @csrf
                                <div class="delete-form__button">
                                    <input type="hidden" name="id" value="">
                                    <button type="submit" popovertarget="detail" popovertargetaction="hide" >削除</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection