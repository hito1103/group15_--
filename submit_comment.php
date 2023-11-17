<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから送信されたデータを受け取る
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    // データベースに接続（適切な接続情報を設定する必要があります）
    $db_host = "localhost";
    $db_username = "your_username";
    $db_password = "your_password";
    $db_name = "your_database_name";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    // データベースに接続できた場合
    if ($conn->connect_error) {
        die("データベースへの接続に失敗しました: " . $conn->connect_error);
    }

    // データベースにコメントを挿入
    $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    
    if ($conn->query($sql) === TRUE) {
        echo "コメントが正常に投稿されました。";
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }

    // データベース接続を閉じる
    $conn->close();
}
?>