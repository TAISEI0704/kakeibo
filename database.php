<?php

    class Database{

        function connect(){
            $dsn = 'mysql:dbname=kakeibo;host=localhost';
            $user = 'root';
            $password = '';

            try{
                $dbh = new PDO($dsn,$user,$password);
                $dbh -> query('SET NAMES UTF8MB4');
                return $dbh;
            }catch(Exception $e){
                exit($e->getMessage());
            }
        }

        //データベースに保存
        function store($input){
            $dbh = $this ->connect();
            $stmt = $dbh -> prepare('INSERT INTO history SET date=?,product=?,price=?');
            $stmt -> execute([$input['date'],$input['product'],$input['price']]);

            // $stmt = $dbh -> prepare('INSERT INTO history SET date=?,product=?,price=?,type=?');
            // $stmt -> execute([$input['date'],$input['product'],$input['price'],$input['type']]);
        }

        //データベース全取得
        function all(){
            $dbh = $this ->connect();
            $sql = 'SELECT*FROM history';
            $stmt = $dbh -> prepare($sql);
            $stmt -> execute();
            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

        //データベースのレコードを1つ取得
        function find($id){
            $dbh = $this ->connect();
            $sql = 'SELECT*FROM history WHERE id = ?';
            $stmt = $dbh -> prepare($sql);
            $stmt -> execute([$id]);
            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

        //情報更新処理
        function update($input){
            $dbh = $this ->connect();
            $stmt = $dbh -> prepare('UPDATE history SET date=?,product=?,price=? WHERE id=?');
            $stmt -> execute([$input['date'],$input['product'],$input['price'],$input['id']]);
        }

        //削除処理
        function destroy($id){
            $dbh = $this ->connect();
            $stmt = $dbh -> prepare('DELETE FROM history WHERE id=?');
            $stmt -> execute([$id]);
        }

    }



?>