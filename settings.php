<?php
session_start();
error_reporting(-1);
mb_internal_encoding('utf-8');
header('Content-Type: text/html; charset=utf-8');
include 'conn\conn.php';;
$user_id=$_SESSION['user_id'];

    if (!isset($_SESSION["user_id"])){
        //echo "Приветствую ".$_SESSION['user_name']."&nbsp";
        //echo "&nbsp<a href='exit.php'>Выйти</a>&nbsp";
    }
    else{

        if(!empty($_POST['username']) && !empty($_POST['age']) && !empty($_POST['tarea'])) {
            $user_name= htmlspecialchars($_POST['username']);
            $age=htmlspecialchars($_POST['age']);
            $tarea=htmlspecialchars($_POST['tarea']);

            $nick=$_SESSION['user_id'];
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=dreamcatcher', _USER_NAME_, _DB_PASSWORD);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql ="UPDATE users SET user_name = :username, about = :about, age = :age WHERE id = :user_id";
                $stmt = $dbh->prepare($sql);

                $stmt->bindValue(':username', $user_name);
                $stmt->bindValue(':about', $tarea);
                $stmt->bindValue(':age', $age);

                $stmt->bindValue(':user_id', $user_id);

                $result = $stmt->execute();

                $dbh = null;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }else{
            $error=  "Одно из полей незаполнено";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> </title>
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
<br><br><br><br><br><br><br><br>
<?php
if (isset($_SESSION["user_id"])) {
    ?>
    <div id='login'>
        <table width=100% cellspacing="0" cellpadding="0">
            <tr>
                <td width="15%"></td>
                <td width="69%" align="center">
                    <?php
                    if (isset($_SESSION["user_id"])) {
                        ?>
                        <h1>Расскажи о себе</h1><br>
                        <form action="settings.php" method="post" name="inabout">
                            <p>
                                <label>Имя<br><input class="input" name="username" size="32" type="text"
                                                     value="Тимофей"></label></p>
                            <p>
                                <label>Возраст<br><input class="input" name="age" size="32" type="text"
                                                         value="18"></label></p>
                            <p>
                                <label>О себе<br><textarea name="tarea" rows="7" cols="33">Ничего не расскажу</textarea></label>
                            </p>
                            <p class="submit">
                                <input class="button" name="register" type="submit" value="Отправить"></p>
                            <p>
                            <h1>
                                <?php
                                echo $error;
                                ?>
                            </h1></p>
                        </form>
                        <form name="upload" action="upload.php" method="POST" ENCTYPE="multipart/form-data">
                            Select the file to upload: <input type="file" name="userfile">
                            <input type="submit" name="upload" value="upload">
                        </form>
                        <?php
                    } else {
                        ?>
                        <a href="auth.php">Залогиниться</a>
                        <?php
                    }
                    ?>
                </td>
                <td width="15%"></td>
            </tr>
        </table>
    </div>
    <?php
}
else
{}
?>
<table width=100%  cellspacing="0" cellpadding="0">
    <tr>
        <td width="15%"></td>
        <td width="69%" align="center">
            <br>
            <br>
            <br>
        </td>
        <td width="15%"></td>
    </tr>
</table>
</body>
</html>