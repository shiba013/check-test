@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__inner">
        <div class="content__title">
            <h2 class="content__title-logo">contact</h2>
        </div>
    </div>

    <div class="form">
        <form action="/confirm" method="post" class="contact-form">
            @csrf
            <div class="form__item">
                <div class="form__item-title">
                    <p class="form__item-logo">お名前
                        <span class="form__item-logo-span">※</span>
                    </p>
                </div>
                <div class="form__item-content">
                    <div class="content__text">
                        <input type="text" name="first_name" placeholder="例: 山田" class="content__text-input" value="{{ old('first_name') }}">&nbsp; &nbsp;
                        <input type="text" name="last_name" placeholder="例: 太郎" class="content__text-input" value="{{ old('last_name') }}">
                    </div>
                    <div class="form__alert">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <p class="form__item-logo">性別
                        <span class="form__item-logo-span">※</span>
                    </p>
                </div>
                <div class="form__item-content">
                    <div class="content__text">
                        <input type="radio" name="gender" value="1" checked>男性&nbsp; &nbsp;
                        <input type="radio" name="gender" value="2">女性&nbsp; &nbsp;
                        <input type="radio" name="gender" value="3">その他
                    </div>
                    <div class="form__alert">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <p class="form__item-logo">メールアドレス
                        <span class="form__item-logo-span">※</span>
                    </p>
                </div>
                <div class="form__item-content">
                    <div class="content__text">
                        <input type="text" name="email" placeholder="例: test@example.com"  class="content__text-input" value="{{ old('email') }}">
                    </div>
                    <div class="form__alert">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <p class="form__item-logo">電話番号
                        <span class="form__item-logo-span">※</span>
                    </p>
                </div>
                <div class="form__item-content">
                    <div class="content__text">
                        <input type="text" name="tel_1" placeholder="080" class="content__text-input"   value="{{ old('tel_1') }}">&nbsp;-&nbsp;
                        <input type="text" name="tel_2" placeholder="1234" class="content__text-input" value="{{ old('tel_2') }}">&nbsp;-&nbsp;
                        <input type="text" name="tel_3" placeholder="5678" class="content__text-input" value="{{ old('tel_3') }}">
                    </div>
                    <div class="form__alert">
                        @error('tel')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <p class="form__item-logo">住所
                        <span class="form__item-logo-span">※</span>
                    </p>
                </div>
                <div class="form__item-content">
                    <div class="content__text">
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" class="content__text-input" value="{{ old('address') }}">
                    </div>
                    <div class="form__alert">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <p class="form__item-logo">建物名</p>
                </div>
                <div class="form__item-content">
                    <div class="content__text">
                        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" class="content__text-input" value="{{ old('building') }}">
                    </div>
                    <div class="form__alert">
                        @error('building')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <p class="form__item-logo">お問い合わせの種類
                        <span class="form__item-logo-span">※</span>
                    </p>
                </div>
                <div class="form__item-content">
                    <div class="content__text">
                        <select name="content" class="content__text-select">
                            <option value="" selected>選択してください</option>
                            @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__alert">
                        @error('content')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <p class="form__item-logo">お問い合わせの内容
                        <span class="form__item-logo-span">※</span>
                    </p>
                </div>
                <div class="form__item-content">
                    <div class="content__text">
                        <input type="textarea" name="detail" placeholder="お問い合わせ内容をご記載ください" class="content__text-input" value="{{ old('detail') }}">
                    </div>
                    <div class="form__alert">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
</div>
@endsection