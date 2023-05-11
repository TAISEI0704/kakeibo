<?php
    require_once('./database.php');

    if(!empty($_POST)){
        if(empty($_POST['date'])){
            exit('<p>日付が入力されていません</p>'.'<br>'.'<a href="./index.php">戻る</a>');
        }
        if(empty($_POST['product'])){
            exit('<p>内容が入力されていません</p>'.'<br>'.'<a href="./index.php">戻る</a>');
        }
        if(empty($_POST['price'])){
            exit('<p>金額が入力されていません</p>'.'<br>'.'<a href="./index.php">戻る</a>');
        }

        $database = new Database();
        $database -> store($_POST);

        header('Location: ./index.php');
        exit;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body class="create">
    <div class="title">
        <h2>新規データ登録</h2>
    </div>
    
    <form method="POST" action="">
        <div>
            <div>
                登録日付：
                <input class="input" type="date" name="date" value="">
                <!-- <br><br> -->
            </div>
            <div>
                登録内容：
                <input class="input" id="input" type="text" name="product" value="">
                <!-- <br><br> -->
            </div>
            <div>
                金額：￥
                <input class="input" type="number" name="price" value="">
                <!-- <br><br> -->
            </div>
        </div>

        <div>
            <div>
                <!-- <div> -->
                    <input type="radio" name="type" value="0" checked>
                    収入
                <!-- </div> -->
                <!-- <div> -->
                    <input type="radio" name="type" value="1">
                    支出
                <!-- </div> -->
            </div>
        </div>

        <input class="submit" type="submit" value="＋新規登録">
    </form>

    <div class="back_page">
         <a href="./index.php">一覧に戻る</a>
    </div>

    
</body>
</html>