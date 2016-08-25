<?php
session_start();
error_reporting(-1);
mb_internal_encoding('utf-8');
header('Content-Type: text/html; charset=utf-8');
include 'conn\conn.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <style>
        <?php
        include 'css/main.css';
        ?>
    </style>
</head>
<body>
<?php
include "menu.php";
?>
<table width=100%  cellspacing="0" cellpadding="0">
    <tr>
        <td width="15%"></td>
        <td width="69%" align="center">
            <br><br><br><br><br>
            <div class="shadow">
                    <table width=100%  cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <?php

//                            if (!empty($_GET["name"])&&!empty($_GET["age"]))
//                            { echo " Получены новые вводные: имя - ".$_GET["name"].", возраст - ".$_GET["age"]." лет";}
//                            else { echo "Переменные не дошли. Проверьте все еще раз."; }

                            $phnumber=htmlspecialchars($_GET['phnumber']);

                            $filename="photos/".$phnumber;
                            if (file_exists($phnumber)) {
                                unlink($filename);
                            }else{
                            }
                            echo "Фото было удалено!";

                           // $phnumber=$_GET['phnumber'];

                            $userid=$_SESSION["user_id"];
                            $dbh = new PDO('mysql:host=localhost;dbname=dreamcatcher', _USER_NAME_, _DB_PASSWORD);
                            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sql = "SELECT * FROM `Photos` WHERE id = :photo_name";
                            $stmt = $dbh->prepare($sql);
                            $stmt->bindValue(':photo_name', $phnumber);
                            $stmt->execute();
                            $row_count = $stmt->rowCount();

                            while ($row = $stmt->fetch()) {
                                    echo "<td align='center'>";
                                    echo "<br><img src=photos/" . $row['phname'] . " width='800'><br>". $row['photo_name'];
                                    echo "<a href='del.php?phn=".$row['phname']."'>Удалить</a>";
                                    echo "</td>";
                            }
                            ?>
                        </tr>
                    </table>
            </div>
        </td>
        <td width="15%"></td>
    </tr>
</table>
</body>
</html>