<?php

$db_connection = mysqli_connect("localhost", "root", "", "listing");

If(!$db_connection) {
    die ("unable to process connection - please try again.");
}