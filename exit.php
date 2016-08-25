<?php

session_start();


$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['usr'];
$_SESSION['logged_in'] = time();

unset($_SESSION['user_id']); // разрегистрировали переменную
unset($_SESSION['user_name']); // разрегистрировали переменную
unset($_SESSION['logged_in']); // разрегистрировали переменную

session_destroy(); // разрушаем сессию

echo 'Вы разлогинились.';
echo "<script language='JavaScript'>";
echo "window.location.href = 'index.php'</script>";
?>