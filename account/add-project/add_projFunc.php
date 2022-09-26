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
    global $submitBtn;

    $projectName = mysqli_real_escape_string($db_connection, $_POST['project_name']);
    $projetWebsite = mysqli_real_escape_string($db_connection ,$_POST['project_mainsite']);
    $projectLauncDate = date('Y-m-d', strtotime($_POST['projectLauncDate']));
    $Projectcategories = $_POST['Projectcategories'];
    $projectAbout = mysqli_real_escape_string($db_connection, $_POST['about_txt']);
    $projectTags = mysqli_real_escape_string($db_connection, "Tag one, Secondtwo, three tags");
    $projectStatus = "Pending";
    $projectIsVerifed = "unclamied";
    $is_featured = "false";
    $listedDate = htmlspecialchars(date('d-m-y'));

    $projectLogo = $_FILES["project_logo"]["name"];
    $project_logo_temp = $_FILES["project_logo"]["tmp_name"];

    // move_uploaded_file($project_logo_temp, "/prolist_admin/public/assets/img/static/$projectLogo");

    $query = "INSERT INTO projects_info(project_logo, project_name, project_content, categories, project_tags, project_status, is_verified, is_featured, project_mainsite, slug_url, date_founded, listed_date) ";
    $query .= "VALUES ( '{$projectLogo}', '" . $projectName . "', '" . $projectAbout . "', '" . $Projectcategories . "', '" . $projectTags . "', '{$projectStatus}', '" . $projectIsVerifed . "', '{$is_featured}', '" . $projetWebsite . "', '" . getSlugUrl($projectName) . "', '" . $projectLauncDate . "', now())";

    $insertQuery = mysqli_query($db_connection, $query);

    if (!$insertQuery) {
        die("Query Failed." . mysqli_error($db_connection));
    } else {
        header("Location: prolist/account/my_listing");
    }
}




?>