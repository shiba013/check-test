@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

<div class="content">
    <div class="content__inner">
        <div class="content__title">
            <h2 class="content__title-logo">confirm</h2>
        </div>
    </div>

    <div class="form">
        <form action="/thanks" method="post" class="confirm__form">
            @csrf
            <div class="confirm-table">
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['first_name'] }}</p>
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                            <p>{{ $contact['last_name'] }}</p>
                            <input type="hidden" name="last_name" value="{{$contact['last_name']}}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <p>
                                @php
                                switch($contact['gender']) {
                                    case "1":
                                        echo "男性";
                                        break;
                                    case "2":
                                        echo "女性";
                                        break;
                                    case "3":
                                        echo "その他";
                                        break;
                                }
                                @endphp
                            </p>
                            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['email'] }}</p>
                            <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['tell_1'] }}{{ $contact['tell_2'] }}{{ $contact['tell_3'] }}</p>
                            <input type="hidden" name="tell_1" value="{{ $contact['tell_1'] }}" />
                            <input type="hidden" name="tell_2" value="{{ $contact['tell_2'] }}" />
                            <input type="hidden" name="tell_3" value="{{ $contact['tell_3'] }}"/>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['address'] }}</p>
                            <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['building'] }}</p>
                            <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの種類</th>
                        <td class="confirm-table__text">
                            <p>{{ $category['content'] }}</p>
                            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの内容</th>
                        <td class="confirm-table__text">
                            <p>{{ $contact['detail'] }}</p>
                            <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="confirm-form__button">
                <button class="confirm-form__button-submit" type="submit">送信</button>
            </div>
        </form>
        <form action="/" method="post" class="edit-form">
            <div class="edit-form__button">
                <button class="edit-form__button-submit" type="submit">修正</button>
            </div>
        </form>
    </div>
</div>

@section('content')