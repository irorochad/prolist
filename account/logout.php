<?php ob_start();
     session_start();
    $_SESSION['user_id'] = null;
    $_SESSION['user_name'] = null;
    $_SESSION['user_password'] = null;
    $_SESSION['user_email'] = null;
    header("Location: ../");
