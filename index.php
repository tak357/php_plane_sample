<?php

/** 
 * PDOでMySQLに接続、テーブル作成、レコード挿入のサンプル
 * 参考：https://blog.codecamp.jp/programming-php-pdo-mysql-1
 * 実行はターミナル上で「php xxx.php」
 */

$dsn = 'mysql:dbname=test;host=localhost';
$username = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

// SQL文を準備します。
$sql = 'create table IF NOT EXISTS test1 (id int, title varchar(255), price int(10));';

// PDOStatementクラスのインスタンスを生成します。
$prepare = $dbh->prepare($sql);

// プリペアドステートメントを実行する
$prepare->execute();

// PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

$sql = "insert into test1 (id, title, price) values
        (1, 'aaa', 980),
        (2, 'bbb', 1980),
        (3, 'ccc', 2980),
        (4, 'ddd', 3980);";

// PDOStatementクラスのインスタンスを生成します。
$prepare = $dbh->prepare($sql);

// プリペアドステートメントを実行する
$prepare->execute();