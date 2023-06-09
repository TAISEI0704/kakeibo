<?php

    require_once('./database.php');

    //削除処理
    if(!empty($_GET) && isset($_GET['id'])){
        $database = new Database();
        $database -> destroy((int)$_GET['id']);
    }

    $database = new Database();
    $histories = $database -> all();
    // var_dump($histories);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家計簿TOP</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
</head>

<?php  ?>

<body>
    <div>
        <h1>家計簿</h1>
    </div>

    <div>
        <button class="create_button"><a href="./create.php" class="register_button">+新規登録</a></button>
    </div>

    <div class="record">
        <div>
            <h2 class="title">履歴</h2>
        </div>
        
        <div class="table">
            <table>
    
                    <thead>
                        <tr>
                        <!-- <div class="thead"> -->
                            <!-- <th>ID</th> -->
                            <th>登録日付</th>
                            <th>登録内容</th>
                            <!-- <th>金額</th> -->
                            <th>収入
                                <?php  ?>
                            </th>
                            <th>支出</th>
                            <td></td>
                            <!-- </div> -->
                        </tr>
                    </thead>
                
                
                <tbody>
                    <?php foreach($histories as $history): ?>
                    <tr class="tbody">
                        <!-- <td><?= $history['id']; ?></td> -->
                        <td><?= $history['date']; ?></td>
                        <td><?= $history['product']; ?></td>
                        <!-- <td><?= '￥'.$history['price']; ?></td> -->
                        <td>
                            <?php if ($history['type'] === 0){
                                echo '￥'.$history['price'];
                            }else{
                                echo '';
                            } ?>
                        </td>
                        <td>
                            <?php if ($history['type'] === 1){
                                echo '￥'.$history['price'];
                            }else{
                                echo '';
                            } ?>
                        </td>
                            
                        
                        <td>
                            <a class="edit_button" href="./edit.php?id=<?= $history['id']; ?>"><i class="fas fa-edit" style="color: #44444c;"></i>編集</a>
                            <a class="delete_button" href="./index.php?id=<?= $history['id']; ?>"><i class="fas fa-eraser" style="color: #44444c;"></i>削除</a>
                        </td>
                        <!-- <td class="delete"><a class="delete_button" href="./index.php?id=<?= $history['id']; ?>"><i class="fas fa-eraser" style="color: #44444c;"></i>削除</a></td> -->
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>



   

</body>
</html>

