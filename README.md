# お問い合わせフォーム

### 環境構築

#### Dockerビルド
1. `git clone git@github.com:knyys/Test1.git`  
2. `docker-compose up -d --build`  

※MySQLは、OSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

#### Laravel構築環境
1. `docker-compose exec php bash`  
2. `cp .env.example .env`  
   環境変数を変更  
3. `composer install`  
4. `php artisan key:generate`  
5. `php artisan migrate`  
6. `php artisan db:seed`  

#### 使用技術
- PHP 7.4.9
- Laravel 8.83.29
- MariaDB 10.3.39

#### ER図  
![test](https://github.com/user-attachments/assets/e34bb0a7-d2f4-4bf7-80cb-06fa0879f84f)


#### URL
- 環境開発: [http://localhost/](http://localhost/)
- phpMyAdmin: [http://localhost:8080/](http://localhost:8080/)
