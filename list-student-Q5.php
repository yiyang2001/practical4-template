<?php
$PAGE_TITLE = 'Select Student';
include('includes/header.php');
?>

<!-- Start of content -->
<!-- P3Q5 -->
<div>
    <h1>List Student</h1>

    <?php
    require_once('includes/helper.php');
    
    // Array of actual table field names and their display names.
    $headers = array(
        'StudentID'   => 'Student ID',
        'StudentName' => 'Student Name',
        'Gender'      => 'Gender',
        'Program'     => 'Program'
    );

    // https://www.w3schools.com/php/php_superglobals_get.asp
    // https://www.w3schools.com/php/func_array_key_exists.asp
    // Validate sort and order values to prevent SQL errors and hacks.
    // Replace "?" to determine which columns (Student ID, Student Name, Gender, Program) to sort
    $sort  = "?";
    
    // Replace "?" to determine which order (Ascending,Descending)
    $order = "?";

    ///////////////////////////////////////////////////////////////////////
    // Generate clickable table headers ///////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    
    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr>';
    foreach ($headers as $key => $value)
    {
        // Replace false to check the $key is the column that want to sort
        if (false) // The sorted field.
        {
            /*
             * - Replace ? in <a href="?">%s</a> with the correct query string
             * - Replace ? in the printf()'s Argnum to the correct value
             */
            printf('
                <th>
                <a href="?">%s</a>
                <img src="images/%s" alt="%s" />
                </th>',
                $key,
                '?',
                $value,
                '?',      // Image.
                '?'); // Alt text.
        }
        else // Non-sorted field.
        {
            /*
             * - Replace ? in <a href="?">%s</a> with the correct query string
             * - Replace ? in the printf()'s Argnum to the correct value
             */
            printf('
                <th>
                <a href="?">%s</a>
                </th>',
                "?",
                "?");
        }
    }
    echo '</tr>';


    ///////////////////////////////////////////////////////////////////////
    // Database select ////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    
    // https://www.w3schools.com/php/php_mysql_connect.asp
    // connect MySQL database
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // SQL with ORDER BY clause.
    // Replace ? with the SQL SELECT query with ORDER BY
    $sql = "?";

    // https://www.w3schools.com/php/func_mysqli_num_rows.asp
    // check the number of rows is more than 0
    if (true){
        // https://stackoverflow.com/questions/6681075/while-loop-in-php-with-assignment-operator
        // https://www.w3schools.com/php/func_mysqli_fetch_array.asp
        // loop the result from the SQL SELECT query
        // replace the true with the correct method
        while (true)
        {
            // replace ? to print the column (Student,StudentName,Gender,Program)
            printf('
                <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                </tr>',
                '?',
                '?',
                '?',
                '?');
        }
    }

    printf('
        <tr>
        <td colspan="4">
            %d record(s) returned.
            [ <a href="insert-student.php">Insert Student</a> ]
        </td>
        </tr>',
        '?'); // replace the ? to the number of row from the result of SQL SELECT query
    echo '</table>'; // Table ends.

    // https://www.w3schools.com/php/func_mysqli_free_result.asp
    mysqli_free_result($result);

    // https://www.w3schools.com/php/func_mysqli_close.asp
    mysqli_close($con);
    ///////////////////////////////////////////////////////////////////////
    ?>
</div>
<!-- End of content -->

<?php
include('includes/footer.php');
?>
