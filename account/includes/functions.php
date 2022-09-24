<?php
function is_admin($db_email)
{
    global $db_connection;
    $query = "SELECT role FROM users WHERE email = '$db_email'";
    $queryFetch = mysqli_query($db_connection, $query);

    if (!$queryFetch) {
        die("Query Couldn't complete");
    } else {
        $row = mysqli_fetch_array($queryFetch);
        if ($row['role'] == 1) {
            return true;
        } else {
            return false;
        }
    }
}


?>
