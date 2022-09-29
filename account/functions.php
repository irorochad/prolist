<?php  ob_start();

function findAllProjectNumbers() {
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
                <?php echo "<a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>View</a>"; ?>
            </td>
        </tr>

<?php

    } // end while loop/.
}

?>