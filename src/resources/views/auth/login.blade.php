<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <title>Fashionably Late</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">
                <h1 class="header__title-logo">Fashionably Late</h1>
                <nav>
                    <ul class="header__nav">
                        <li class="header__nav-list">
                            <form action="/register" method="post">
                                @csrf
                                <button type="submit" class="nav__button">register</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="content">
            <div class="content__inner">
                <div class="content__title">
                    <h2 class="content__title-logo">login</h2>
                </div>
            </div>

            <div class="login__box">
                <div class="login__box-item">
                    <form action="/admin" method="post" class="login-form">
                        @csrf
                        <div class="login-form__title">
                            <span class="login-form__title-span">メールアドレス</span>
                            <input type="email" name="email" value="例: test@example.com" class="login-form__title-input">
                        </div>
                        <div class="form__alert">
                            @if($errors->any())
                            <div class="form__alert--danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="login-form__title">
                            <span class="login-form__title-span">パスワード</span>
                            <input type="password" name="password" value="" class="login-form__title-input">
                        </div>
                        <div class="form__alert">
                            @if($errors->any())
                            <div class="form__alert--danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="login-form__button">
                            <button type="submit" class="login-form__button-submit">ログイン</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
</body>
</html>