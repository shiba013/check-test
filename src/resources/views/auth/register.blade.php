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
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">
                <h1 class="header__title-logo">Fashionably Late</h1>
                <nav>
                    <ul class="header__nav">
                        <li class="header__nav-list">
                            <form action="/login" method="get">
                                @csrf
                                <button type="submit" class="nav__button">login</button>
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
                    <h2 class="content__title-logo">register</h2>
                </div>
            </div>

            <div class="register__box">
                <div class="register__box-item">
                    <form action="/register" method="post" class="register-form">
                        @csrf
                        <div class="register-form__title">
                            <span class="register-form__title-span">お名前</span>
                            <input type="text" name="name" placeholder="例: 山田 太郎" class="register-form__title-input">
                        </div>
                        <div class="form__alert">
                            <p class="form__alert--danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="register-form__title">
                            <span class="register-form__title-span">メールアドレス</span>
                            <input type="text" name="email" placeholder="例: test@example.com" class="register-form__title-input">
                        </div>
                        <div class="form__alert">
                            <p class="form__alert--danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="register-form__title">
                            <span class="register-form__title-span">パスワード</span>
                            <input type="password" name="password" placeholder="例: coachtech1106" class="register-form__title-input">
                        </div>
                        <div class="form__alert">
                            <p class="form__alert--danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="register-form__button">
                            <button type="submit" class="register-form__button-submit">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
</body>
</html>