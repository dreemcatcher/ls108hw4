<?php
error_reporting(-1);
mb_internal_encoding('utf-8');
header('Content-Type: text/html; charset=utf-8');
include 'conn\conn.php';

if(!empty($_POST['nickname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $nick= htmlspecialchars($_POST['nickname']);
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=dreamcatcher', _USER_NAME_, _DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*) as num FROM users WHERE usr = :username";
        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':username', $nick);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['num'] > 0){
            echo "That username already exists!";
            // die();
        }else
        {
            echo "Такого юзера не существует";
            $sql = "INSERT INTO users (usr, pas, email) VALUES (:username, :password, :email)";
            $stmt = $dbh->prepare($sql);

            $stmt->bindValue(':username', $nick);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':email', $email);

            $result = $stmt->execute();

            if($result){
                echo 'Thank you for registering with our website.';
                echo "<script language='JavaScript'>";
                echo "window.location.href = 'index.php'</script>";
            }
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}else{
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
       // include 'css/style.css';
        ?>
    </style>
</head>
<body>
<br><br><br><br><br><br>
<div id='login'>
<table width=100%  cellspacing="0" cellpadding="0">
    <tr>
        <td width="15%"></td>
        <td width="69%" align="center">
                    <h1>Регистрация</h1><br>
                    <form action="reg.php" method="post" name="reg">
                        <p>
                            <label>Ник<br><input class="input" name="nickname" size="32" type="text"></label></p>
                        <p>
                            <label>E-mail<br><input class="input" name="email" size="32" type="email"></label></p>
                        <p>
                            <label>Пароль<br><input class="input" name="password" size="32" type="password"></label></p>
                        <p class="submit">
                            <input class="button" name= "register" type="submit" value="Зарегистрироваться"></p>
                        <p class="regtext">
                            <a href= "index.php">Уже зарегистрированы?</a></p>
                    </form>
        </td>
        <td width="15%"></td>
    </tr>
</table>
</div>
<?php
// Тестируем бд на соединение
//include 'conn\conn.php';
//        $linker->real_query("SELECT * FROM `users` WHERE usr='igor'");
//        $res = $linker->use_result();
//        while ($row = $res->fetch_assoc()) {
//            //echo $row['usr'];
//            $numrows=$linker->affected_rows;
//            if($numrows==0){
//                echo "Такой ник свободен<br>";
//            }
//            else{
//                echo "<br><center>Подключение к базе данных работает стабильно</center>";
//                //echo "Такой ник уже занят";
//            }
//        }
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