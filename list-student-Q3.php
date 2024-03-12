<?php
$PAGE_TITLE = 'Select Student';
// https://www.w3schools.com/php/php_includes.asp
// import header.php from includes folder

?>

<!-- Start of content -->
<!-- P3Q3 -->
<div>
    <h1>List Student</h1>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Gender</th>
            <th>Program</th>
        </tr>

        <?php
        // https://www.w3schools.com/php/keyword_require_once.asp
        // import helper.php from includes folder
        
        // NOTE:
        // -----
        // The "helper.php" file contains definition for
        // DB_HOST, DB_USER, DB_PASS and DB_NAME.

        ///////////////////////////////////////////////////////////////////////
        // Database select ////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////

        // NOTE:
        // -----
        // https://www.w3schools.com/php/php_mysql_connect.asp
        // connect MySQL database
        
        // https://www.w3schools.com/php/func_mysqli_connect_error.asp
        // https://www.w3schools.com/php/func_misc_die.asp
        // check the connection is succesful or not. If not display the error message        

        

        // Replace ? with the SQL SELECT query
        $sql = "?";

        // https://www.w3schools.com/php/php_mysql_select.asp
        // https://www.w3schools.com/php/func_mysqli_query.asp
        // Run the $sql by using query method and store the result in $result
        

        // https://www.w3schools.com/php/func_mysqli_num_rows.asp
        // check the number of rows is more than 0
        if (true)
        {
            // https://stackoverflow.com/questions/6681075/while-loop-in-php-with-assignment-operator
            // https://www.w3schools.com/php/func_mysqli_fetch_array.asp
            // loop the result from the SQL SELECT query
            // replace the false with the correct method
            while (false)
            {
                // replace ? to print the column (StudentID,StudentName,Gender [Fullname of gender],Program [Fullname of Program])
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
                                
                // OR
                // echo '
                //     <tr>
                //     <td>' . '?' . '</td>
                //     <td>' . '?' . '</td>
                //     <td>' . '?' . '</td>
                //     <td>' . '?' . '</td>
                //     </tr>';

                // NOTE:
                // -----
                // Lookup tables (arrays) are defined in "helper.php".
            }
        }

        // replace ? to the number of row from the result of SQL SELECT query
        printf('
            <tr>
            <td colspan="4">
                %d record(s) returned.
                [ <a href="insert-student.php">Insert Student</a> ]
            </td>
            </tr>',
            '?');
        
          // https://www.w3schools.com/php/func_mysqli_free_result.asp
          mysqli_free_result($result);
          // https://www.w3schools.com/php/func_mysqli_close.asp
          mysqli_close($con);
        ///////////////////////////////////////////////////////////////////////
        ?>
    </table>
</div>
<!-- End of content -->
<?php
// import footer.php from includes folder

?>
