<?php

session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != NULL) {
    unset($_SESSION['user_id']);
    header("Location: index.php");
    echo 'Bạn đã đăng xuất thành công.';

}

?>
