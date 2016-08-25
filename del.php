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
                        $phnumber=htmlspecialchars($_GET['phn']);
                        //$phnumber=$_GET['phn'];
                        $userid=$_SESSION["user_id"];
                        $dbh = new PDO('mysql:host=localhost;dbname=dreamcatcher', _USER_NAME_, _DB_PASSWORD);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "DELETE FROM `Photos` WHERE phname = :photo_name";
                        $stmt = $dbh->prepare($sql);
                        $stmt->bindValue(':photo_name', $phnumber);
                        $stmt->execute();

                        // Файл существует?
                        if (isset($_GET['phn'])){
                            // Файл существует?
                            $filename="photos/".htmlspecialchars($_GET['phn']);
                            if (file_exists($filename)) {
                                unlink($filename);
                            }else{

                            }
                        }else
                        {

                        }


//                        $filename="photos/".$phnumber;
//                        if (file_exists($phnumber)) {
//                            unlink($filename);
//                        }else{
//                        }
//
//                        $filename="photos/".htmlspecialchars($_GET['unl']);
//                        if (file_exists($filename)) {
//                            unlink($filename);
//                        }else{
//
//                        }

                        echo "Фото было удалено!";
                        ?>
                        <script language = 'javascript'>
                            var delay = 1000;
                            setTimeout("document.location.href='index.php'", delay);
                        </script>
                        <p>Через 1 секунду Вы будете перенаправлены на него. Но на случай если ничего не происходит, вот ссылка. <a href='index.php'>Главная</a>
                        </p>
                    </tr>
                </table>
            </div>
        </td>
        <td width="15%"></td>
    </tr>
</table>
</body>
</html>