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
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>

    <div id='login'>
        <table width=100% cellspacing="0" cellpadding="0">
            <tr>
                <td width="15%">
<?php
$user_id=$_SESSION['user_id'];
$usernameS=$_SESSION['user_name'];

if (!isset($_SESSION["user_id"])){
    echo "Приветствую ".$_SESSION['user_name']."&nbsp";
    echo "&nbsp<a href='exit.php'>Выйти</a>&nbsp";
}
else{
    $uploaddir = 'photos/';

    $uploadname=$_SESSION['user_name'].mt_rand(10000,99999).time().'.jpg';

   // $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    $uploadfile = $uploaddir . $uploadname;

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "File uploading failed.\n";
    }
    echo "<a href='settings.php'>Back</a><br>";
    echo "Файл ". $uploadname . " был загружен<br>";
    echo "<img src=photos/".$uploadname." width=200><br>";

    echo "Приветствую ".$_SESSION['user_name']."&nbsp";
    echo "&nbsp<a href='index.php'>На главную</a>&nbsp";
    echo "&nbsp<a href='exit.php'>Выйти</a>&nbsp";


    $dbh = new PDO('mysql:host=localhost;dbname=dreamcatcher', _USER_NAME_, _DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Такого юзера не существует";
    $sql = "INSERT INTO Photos (userid, phname) VALUES (:userid, :phname)";
    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':userid', $user_id);
    $stmt->bindValue(':phname', $uploadname);

    $result = $stmt->execute();

    if($result){
       echo "Есть запись в БД";
      //   echo "<script language='JavaScript'>";
      //    echo "window.location.href = 'index.php'</script>";
    }


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

            echo "<script language='JavaScript'>";
            echo "window.location.href = 'settings.php'</script>";
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }else{
        echo "Одно из полей незаполнено";
    }
}
?></td></tr></table></body>
</html>
