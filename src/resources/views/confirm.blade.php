@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
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
                            <p>{{ $contact['first_name'] }}&nbsp; &nbsp;{{ $contact['last_name'] }}</p>
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <p>
                                @if($contact['gender'] == 1)
                                男性
                                @elseif($contact['gender'] == 2)
                                女性
                                @else
                                その他
                                @endif
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
                            <p>{{ $contact['tel_1'] }}{{ $contact['tel_2'] }}{{ $contact['tel_3'] }}</p>
                            <input type="hidden" name="tel_1" value="{{ $contact['tel_1'] }}" />
                            <input type="hidden" name="tel_2" value="{{ $contact['tel_2'] }}" />
                            <input type="hidden" name="tel_3" value="{{ $contact['tel_3'] }}"/>
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
                <input class="confirm-form__button-submit" type="submit" value="送信" name="send">
                <input class="back-button" type="submit" value="修正" name="back">
            </div>
        </form>
    </div>
</div>

@endsection