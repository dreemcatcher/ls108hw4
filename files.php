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
<?php

if (isset($_GET['unl'])){
    // Файл существует?
    $filename="photos/".htmlspecialchars($_GET['unl']);
    if (file_exists($filename)) {
        unlink($filename);
    }else{

    }
}else
{

}
?>
<table width=100%  cellspacing="0" cellpadding="0">
    <tr>
        <td width="15%"></td>
        <td width="69%" align="center">
            <br><br><br><br><br><br><br><br>
            <div class="shadow">
                <?php
                if (isset($_SESSION["user_id"])){
                    ?>
                    <table width=100%  cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <?php
                            $userid=$_SESSION["user_id"];
                            $dir = 'photos';
                            $f = scandir($dir);
                            foreach ($f as $file){
                                echo "<br><img src=photos/" . $file . " width='330'><br>";
                                echo $file."<br/>";
                                echo "<br><a href='files.php?unl=".$file."'>DELETE THIS</a>";

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
                }
                ?>
            </div>
        </td>
        <td width="15%"></td>
    </tr>
</table>
</body>
</html>