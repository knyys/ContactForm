# お問い合わせフォーム

### 環境構築

#### Dockerビルド
1. `git clone git@github.com:knyys/Test1.git`  
2. `docker-compose up -d --build`  

※MySQLは、OSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

#### Laravel構築環境
1. `docker-compose exec php bash`  
2. `cp .env.example .env`
3. 環境変数を変更
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
4. `composer install`  
5. `php artisan key:generate`  
6. `php artisan migrate`  
7. `php artisan db:seed`  

#### 使用技術
- PHP 7.4.9
- Laravel 8.83.29
- MariaDB 10.3.39

#### ER図  
![test](https://github.com/user-attachments/assets/917ed292-efa7-4999-8fc0-484a35968ae2)



#### URL
- 環境開発: [http://localhost/](http://localhost/)
- phpMyAdmin: [http://localhost:8080/](http://localhost:8080/)
