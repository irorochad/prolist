<?php ob_start();
 include "../../includes/db/db.inc.php"; 
?>

<?php

// This function converts empty space in the project name into - to create the slug url with -
function getSlugUrl($slug_string)
{

    $slug = preg_replace('/[^a-z0-9-]+/', '-', strtolower($slug_string));
    return $slug;
}

function sendData()
{

    global $db_connection;
    // Some databse column like the project status are set to default values in the database. 
    // Do well to check them out.

    $user_id = $_SESSION['user_id'];

    $projectName = mysqli_real_escape_string($db_connection, $_POST['project_name']);
    $projetWebsite = mysqli_real_escape_string($db_connection ,$_POST['project_mainsite']);
    $projectLauncDate = date('Y-m-d', strtotime($_POST['projectLauncDate']));
    $Projectcategories = $_POST['Projectcategories'];
    $projectAbout = mysqli_real_escape_string($db_connection, $_POST['about_txt']);
    $projectTags = mysqli_real_escape_string($db_connection, "Tag one, Secondtwo, three tags");
    
    $projectLogo = $_FILES["project_logo"]["name"];
    $project_logo_temp = $_FILES["project_logo"]["tmp_name"];

    // move_uploaded_file($project_logo_temp, "/prolist_admin/public/assets/img/static/$projectLogo");

    $query = "INSERT INTO projects_info(user_id, project_logo, project_name, project_content, categories, project_tags, project_mainsite, slug_url, date_founded) ";
    $query .= "VALUES ('{$user_id}', '{$projectLogo}', '" . $projectName . "', '" . $projectAbout . "', '" . $Projectcategories . "', '" . $projectTags . "', '" . $projetWebsite . "', '" . getSlugUrl($projectName) . "', '" . $projectLauncDate . "')";

    $insertQuery = mysqli_query($db_connection, $query);

    if (!$insertQuery) {
        die("Query Failed." . mysqli_error($db_connection));
    } else {
        header("Location: ../my_listing");
    }
}




?>