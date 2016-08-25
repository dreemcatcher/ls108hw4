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
       // include 'css/style.css';
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
<!--        --><?php
//            if (isset($_SESSION["user_id"])){
//                echo "Приветствую ".$_SESSION['user_name']."&nbsp";
//                echo "&nbsp<a href='settings.php'>Настройки</a>&nbsp";
//                echo "&nbsp<a href='photos.php'>фотки</a>&nbsp";
//                echo "&nbsp<a href='exit.php'>Выйти</a>&nbsp";
//            }
//            else{
//                echo "<a href='reg.php'>Зарегистрироваться </a>&nbsp<a href='auth.php'>Авторизоваться</a>";
//            }
//        ?>
            <br><br><br><br><br><br><br><br>
            <div class="shadow">
<?php
                if (isset($_SESSION["user_id"])){
?>
                <table width=100%  cellspacing="0" cellpadding="0" border="0">
                    <tr>
<?php
    $userid=$_SESSION["user_id"];
    $dbh = new PDO('mysql:host=localhost;dbname=dreamcatcher', _USER_NAME_, _DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM `Photos` WHERE userid = :userid";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':userid', $userid);
    $stmt->execute();
    $row_count = $stmt->rowCount();

    $count=0;
    while ($row = $stmt->fetch()) {
        if($count==3){
            echo "</tr><tr>";
            $count=0;
        }else{
            echo "<td align='center'>";
            echo "<br><a href='photoedit.php?phnumber=".$row['id']."'><img src=photos/" . $row['phname'] . " width='330'><br>". $row['photo_name'] ."</a>";
            echo "</td>";
            $count++;
        }
    }
?>
                    </tr>
                </table>
                <?php
                }
                else{
                    ?>
                    <h1>Надо бы <a href='auth.php'>залогиниться </a>/ <a href='reg.php'> зарегистрироваться</a></h1>
                    <?php
                    // <img src="photos/1.jpg">
                    //echo "<a href='reg.php'>Зарегистрироваться </a>&nbsp<a href='auth.php'>Авторизоваться</a>";
                }

?>
            </div>
        </td>
        <td width="15%"></td>
    </tr>
</table>
</body>
</html>