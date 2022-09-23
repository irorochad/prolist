<?php session_start();
include "db/db.inc.php";

if (isset($_POST['loginBtn'])) {
    $emailId = mysqli_real_escape_string($db_connection, $_POST['email']);
    $password = mysqli_real_escape_string($db_connection, $_POST['password']);

    $query = "SELECT * FROM users WHERE `email` = '$emailId'";
    $queryRun = mysqli_query($db_connection, $query);

    while ($row = mysqli_fetch_array($queryRun)) {
        $db_id = $row['id'];
        $db_name = $row['name'];
        $db_password = $row['password'];
        $db_email = $row['email'];
        $db_role = $row['role'];
    }
    // Check if the inputed password matched with the password in the database.

    if (password_verify($password, $db_password)) {
        $_SESSION['user_name'] = $db_name;
        $_SESSION['user_password'] = $db_password;
        $_SESSION['user_email'] = $db_email;
        header("Location: ../account");
    } else {
        header("Location: ../login");
    }
} else {
    header("Location: ../login");
}
