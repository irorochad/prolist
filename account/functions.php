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
            <td class='py-4 px-6'>
                <button class='pActions font-medium text-blue-600 dark:text-blue-500 hover:underline'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                    </svg>
                </button>
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



// when trying to update user password, check if the old password inputed is same as the one in the database.
function checkOldPassword()
{
    global $db_connection;
    $the_user_id = $_SESSION['user_id'];
    $oldPassword = mysqli_real_escape_string($db_connection, $_POST['oldPass']);

    $passQuery = "SELECT password FROM users WHERE id = '{$the_user_id}'";
    $runPassQuery = mysqli_query($db_connection, $passQuery);

    $row = mysqli_fetch_array($runPassQuery);
    $db_password =   $row['password'];

    if (password_verify($oldPassword, $db_password)) {
        return true;
    } else {
        return false;
    }
}
// Update the user password.
function updatePassword()
{
    if (isset($_POST['updatePassBTN'])) {
        global $db_connection;
        $the_user_id = $_SESSION['user_id'];

        $newPassword = mysqli_real_escape_string($db_connection, $_POST['newPass']);

        $passError = [
            'oldPass' => '',
            'newPass' => ''
        ];
        // check if the old password matches what the user types

        if (!checkOldPassword()) {
            $passError['oldPass'] = 'Sorry, old password does\'t match ';
            // echo "Old Password doesn't match";
        }

        if (strlen($newPassword) < 5) {
            $passError['oldPass'] = 'Password must be less than 4 characters';
        }

        foreach ($passError as $key => $value) {
            if (empty($value)) {
                unset($passError[$key]);
            }

            if (empty($passError)) {
                // $query = "UPDATE users SET `password` = '{$newPassword}' WHERE id = $the_user_id ";
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT, array('cost'  => 12));

                $query = "UPDATE users SET `password` = '{$hashedPassword}' WHERE id = $the_user_id";
                $runInsert = mysqli_query($db_connection, $query);
                if (!$runInsert) {
                    die("Something went wrong");
                } else {
                    echo "<p class='text-blue-700'>User password has been updated</p>";
                }
            }
        }
    ?>
        <p class="text-red-700"><?php echo isset($passError['oldPass']) ? $passError['oldPass'] : '' ?></p>
        <p class="text-red-700"><?php echo isset($passError['newPass']) ? $passError['newPass'] : '' ?></p>
<?php
    }
}

// check if email exists
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

// update user details, name and email
function updateUserDetails()
{

    global $db_connection;
    $the_user_id = $_SESSION['user_id'];

    global $user_nameUpdate;
    global $user_email_Update;

    $sql = "UPDATE users SET `name` = '$user_nameUpdate', `email` = '$user_email_Update' WHERE id = $the_user_id";

    $runQuery = mysqli_query($db_connection, $sql);
    if (!$runQuery) {
        die("Unable to update user settings.");
    } else {
        header("Location: settings ");
        $_SESSION['message'] = "This user profile been updated";
    }
}
















?>