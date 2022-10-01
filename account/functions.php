<?php ob_start();

function myProjectCounts()
{
    global $db_connection;
    $query = "SELECT * FROM projects_info WHERE `user_id` = {$_SESSION['user_id']} ";
    $findAllPs = mysqli_query($db_connection, $query);
    echo $count = mysqli_num_rows($findAllPs);
}


function getAllProjects()
{
    global $db_connection;
    $query = "SELECT * FROM projects_info WHERE `user_id` = {$_SESSION['user_id']} ";
    $fetch_All_Posts = mysqli_query($db_connection, $query);

    while ($row = mysqli_fetch_assoc($fetch_All_Posts)) {
        $id = $row['id'];
        $project_name = $row['project_name'];
        $project_cats = $row['categories'];
        $project_staus = $row['project_status'];
        $project_verified = $row['is_verified'];
        $project_date = $row['listed_date'];

?>

        <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600'>

            <th scope='row' class='py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                <?php echo $project_name; ?>
            </th>
            <td class='py-4 px-6'>
                <?php echo $project_cats; ?>
            </td>
            <td class='py-4 px-6'>
                <?php echo $project_staus; ?>
            </td>
            <td class='py-4 px-6'>
                <?php echo $project_verified; ?>
            </td>
            <td class='py-4 px-6'>
                <?php echo $project_date; ?>
            </td>
            <td class='py-4 px-6 text-right'>
                <a href='editpage?<?php echo $id; ?>' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </a>
            </td>
        </tr>

<?php

    } // end while loop/.
}


// Add and Remove the session messages after a task is done
function actionsMsg()
{
    if (isset($_SESSION['message'])) { ?>

        <h4 class="text-blue-600"><?= $_SESSION['message']; ?></h4>
<?php
        unset($_SESSION['message']);
    }
}


function email_exists($user_email_Update)

{
    global $db_connection;
    $the_user_id = $_SESSION['user_id'];

    $emailQuery = "SELECT email FROM users WHERE `email` = '$user_email_Update' AND `id` != '$the_user_id'";      
                    //find the email column from the users, where the id is not equal to the current user id.
    $runemailQuery = mysqli_query($db_connection, $emailQuery);

    if (mysqli_num_rows($runemailQuery) > 0) {
        return true;
    } else {
        return false;
    }
}


function updateUserDetails()
{

    global $db_connection;
    $the_user_id = $_SESSION['user_id'];

    global $user_nameUpdate;
    global $user_email_Update;

    $sql = "UPDATE users SET `name` = '$user_nameUpdate', `email` = '$user_email_Update' WHERE id = $the_user_id";

    $runQuery = mysqli_query($db_connection, $sql);
    if (!$runQuery) {
        die("Unable to add to category");
    } else {
        header("Location: settings ");
        $_SESSION['message'] = "This user profile been updated";
    }
}
















?>