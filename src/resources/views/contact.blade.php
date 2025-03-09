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
                    <span class="form__item-logo">お名前</span>
                    <span class="form__item-logo-span">※</span>
                </div>
            </div>
            <div class="form__item-content">
                <div class="content__text">
                    <input type="text" name="first_name" placeholder="例: 山田" class="content__text-input">
                </div>
                <div class="form__alert">
                    @if($errors->has('first_name'))
                    <div class="form__alert--danger">
                        <ul>
                            @foreach($errors->get('first_name') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                <div class="content__text">
                    <input type="text" name="last_name" placeholder="例: 太郎" class="content__text-input">
                </div>
                <div class="form__alert">
                    @if($errors->has('last_name'))
                    <div class="form__alert--danger">
                        <ul>
                            @foreach($errors->get('last_name') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <span class="form__item-logo">性別</span>
                    <span class="form__item-logo-span">※</span>
                </div>
            </div>
            <div class="form__item-content">
                <div class="content__text">
                    <input type="radio" name="gender" value="1" checked>男性
                    <input type="radio" name="gender" value="2">女性
                    <input type="radio" name="gender" value="3">その他
                </div>
            </div>
            <div class="form__alert"></div>
            @if($errors->has('gender'))
            <div class="form__alert--danger">
                <ul>
                    @foreach($errors->get('gender') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form__item">
                <div class="form__item-title">
                    <span class="form__item-logo">メールアドレス</span>
                    <span class="form__item-logo-span">※</span>
                </div>
            </div>
            <div class="form__item-content">
                <div class="content__text">
                    <input type="text" name="email" placeholder="例: test@example.com" class="content__text-input">
                </div>
            </div>
            <div class="form__alert">
                @if($errors->has('email'))
                <div class="form__alert--danger">
                    <ul>
                        @foreach($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <span class="form__item-logo">電話番号</span>
                    <span class="form__item-logo-span">※</span>
                </div>
            </div>
            <div class="form__item-content">
                <div class="content__text">
                    <input type="text" name="tel" placeholder="080" class="content__text-input">&nbsp;-&nbsp;
                    <input type="text" name="tel" placeholder="1234" class="content__text-input">&nbsp;-&nbsp;
                    <input type="text" name="tel" placeholder="5678" class="content__text-input">
                </div>
            </div>
            <div class="form__alert">
                @if($errors->has('tel'))
                <div class="form__alert--danger">
                    <ul>
                        @foreach($errors->get('tel') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <span class="form__item-logo">住所</span>
                    <span class="form__item-logo-span">※</span>
                </div>
            </div>
            <div class="form__item-content">
                <div class="content__text">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" class="content__text-input">
                </div>
            </div>
            <div class="form__alert">
                @if($errors->has('address'))
                <div class="form__alert--danger">
                    <ul>
                        @foreach($errors->get('address') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <span class="form__item-logo">建物名</span>
                </div>
            </div>
            <div class="form__item-content">
                <div class="content__text">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" class="content__text-input">
                </div>
            </div>
            <div class="form__alert">
                @if($errors->has('building'))
                <div class="form__alert--danger">
                    <ul>
                        @foreach($errors->get('building') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <span class="form__item-logo">お問い合わせの種類</span>
                    <span class="form__item-logo-span">※</span>
                </div>
            </div>
            <div class="form__item-content">
                <div class="content__text">
                    <select name="content" class="content__text-select">
                        @foreach($categories as $category)
                        <option value="" selected>選択してください</option>
                        <option value="{{ $category['id'] }}">{{$category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form__alert">
                @if($errors->has('content'))
                <div class="form__alert--danger">
                    <ul>
                        @foreach($errors->get('content') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="form__item">
                <div class="form__item-title">
                    <span class="form__item-logo">お問い合わせ内容</span>
                    <span class="form__item-logo-span">※</span>
                </div>
            </div>
            <div class="form__item-content">
                <div class="content__text">
                    <input type="textarea" name="detail" placeholder="お問い合わせ内容をご記載ください" class="content__text-input">
                </div>
            </div>
            <div class="form__alert">
                @if($errors->has('detail'))
                <div class="form__alert--danger">
                    <ul>
                        @foreach($errors->get('detail') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
</div>


@endsection