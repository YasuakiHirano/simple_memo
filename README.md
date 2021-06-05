![SimpleMemo](https://raw.githubusercontent.com/wiki/YasuakiHirano/simple_memo/images/simple-memo.gif)
## simple memo  
phpのみで作成したEvernote風メモアプリです。  
nginx1.19.1 + php7.4-fpm + mysql5.7を使用しています。  

## 起動する  
docker-composeを使って、下記のコマンドで起動できます。  

```
docker-compose -f .docker_memo/docker-compose.yml up -d
```

## データベースの設定  
### データベース作成  
http://localhost:8081 からphpmyadminを開いて、下記のsqlでデータベースを作成します。  

```
CREATE DATABASE simple_memo DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### テーブル作成  
作成したデータベースを選択して、下記のsqlでテーブルを作成します。  

```
CREATE TABLE users (
    id BIGINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
```

```
CREATE TABLE memos (
    id BIGINT NOT NULL AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    title VARCHAR(255),
    content TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
```

## 教材
こちらで作り方や内容について解説しています。

[PHPとLaravelでEvernote風のメモアプリを作ってみよう！](https://www.techpit.jp/courses/132)
