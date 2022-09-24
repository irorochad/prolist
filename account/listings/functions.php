<?php ob_start(); ?>

<?php




function FindAllProjects()
{
    global $db_connection;
    $query = "SELECT * FROM projects_info";
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
                <?php echo $id; ?>
            </th>
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
                <?php echo "<a href='overview?p_id=$id' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>View</a>"; ?>     
            </td>
        </tr>

<?php

    } // end while loop/.
}
?>

<!-- approved listing func -->
<?php

function FindapprovedProjects()
{

    global $db_connection;
    $approvedLogs = "Approved";
    $query = "SELECT * FROM projects_info WHERE project_status = '$approvedLogs' ";
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
            <?php echo $id; ?>
            </th>
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
            <?php echo "<a href='overview?p_id=$id' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>View</a>"; ?>     
            </td>
        </tr>

<?php } // end while loop/.
}
?>

<?php

function pendingProject()
{

    global $db_connection;
    $pendingLogs = "pending";
    $query = "SELECT * FROM projects_info WHERE project_status = '$pendingLogs' ";
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
            <?php echo $id; ?>
            </th>
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
            <?php echo "<a href='overview?p_id=$id' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>View</a>"; ?>     
            </td>
        </tr>

<?php } // end while loop/.
}
?>
<!-- Rejected Projects here -->
<?php

function rejectedProjects()
{

    global $db_connection;
    $status = "Rejected";
    $query = "SELECT * FROM projects_info WHERE project_status = '$status' ";
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
            <?php echo $id; ?>
            </th>
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
            <?php echo "<a href='overview?p_id=$id' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>View</a>"; ?>     
            </td>
        </tr>

<?php } // end while loop/.
}
?>
<!-- End Rejected -->

<!-- Show Project Page. -->
