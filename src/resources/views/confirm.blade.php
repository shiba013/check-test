@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

<div class="content">
    <div class="content__inner">
        <div class="content__title">
            <h2 class="content__title-logo">contact</h2>
        </div>
    </div>

    <div class="form"></div>
        <form action="" method="post" class="confirm__form">
            @csrf
            <div class="confirm-table">
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text">
                            <input type="text" name="name" value="{{$contact['first_name']}} . {{$contact['last_name']}}" readonly>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <input type="text" name="gender" value="{{$contact['gender']}}" readonly>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__text">
                            <input type="email" name="email" value="{{$contact['email']}}" readonly>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                            <input type="tel" name="tel" value="{{$contact['tel_1']}} . {{$contact['tel_2']}} . {{$contact['tel_3']}}" readonly>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__text">
                            <input type="text" name="address" value="{{$contact['address']}}" readonly>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__text">
                            <input type="text" name="building" value="{{$contact['building']}}" readonly>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの種類</th>
                        <td class="confirm-table__text">
                            <input type="text" name="content" value="{{$category['content']}}" readonly>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの内容</th>
                        <td class="confirm-table__text">
                            <input type="text" name="detail" value="{{$contact['detail']}}" readonly>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="confirm-form__button">
                <button class="confirm-form__button-submit" type="submit">送信</button>
            </div>
        </form>
        <form action="/confirm/" method="post" class="edit-form">
            <div class="edit-form__button">
                <button class="edit-form__button-submit" type="submit">修正</button>
            </div>
        </form>
    </div>
</div>

@section('content')