<?php
    require_once('./database.php');

    //更新処理
    if(!empty($_POST)){
        $input = $_POST;
        $input['id'] = $_GET['id'];

        if(empty($input['date'])){
            exit('日付が入力されていません');
        }
        if(empty($input['product'])){
            exit('内容が入力されていません');
        }
        if(empty($input['price'])){
            exit('金額が入力されていません');
        }

        $database = new Database();
        $database -> update($input);

        header('Location: ./index.php');
        exit;
    }

    $database = new Database();
    $histories = $database -> find((int)$_GET['id']);
    // var_dump($histories);

    if(empty($histories)){
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
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style_edit.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body class="edit_body">
    <div>
        <h2 class="title">履歴更新</h2>
    </div>

    <form method="POST" action="">
        <table>
            <thead>
                <tr>
                    <th>登録日付</th>
                    <th>登録内容</th>
                    <th>金額</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($histories as $history): ?>
                <tr>
                    <!-- <td><?= $history['id']; ?></td> -->
                    <td><input type="date" name="date" value="<?= $history['date']; ?>"></td>
                    <td><input type="text" name="product" value="<?= $history['product']; ?>"></td>
                    <td>￥<input type="number" name="price" value="<?= $history['price']; ?>"></td>
                    <td><input type="radio" name="type" value="0" checked>収入</td>
                    <td><input type="radio" name="type" value="1">支出</td>
                    <td><button type="submit">更新</button></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>

    <a href="./index.php">一覧に戻る</a>
</body>
</html>