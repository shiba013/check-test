# お問い合わせフォーム

## 環境構築
Dockerビルド
```
1. git clone git@github.com:shiba013/check-test.git
2. docker-compose up -d --build
```
※MySQLは、OSによって起動しない場合があるのでそれぞれのPCにあわせてdocker-compose.ymlファイルを編集してください。

Laravel環境構築
```
1. docker-compose exec php bash
2. composer create-project "laravel/laravel=8.*" . --prefer-dist
3. .envファイルにて環境変数を変更
4. php artisan migrate
5. php aritsan db:seed
```
## 使用技術
・PHP 7.4.9-fpm
・Laravel 8.83.29
・MySQL 8.0.26
・nginx 1.21.1

## ER図
<img width="993" alt="er" src="https://github.com/user-attachments/assets/2ad74ed3-7fa8-4b97-ba05-42e97d0229b7" />

## URL
・開発環境：http://localhost/
・phpMyAdmin：http://localhost:8080/
