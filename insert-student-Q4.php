<?php
$PAGE_TITLE = 'Insert Student';
// https://www.w3schools.com/php/php_includes.asp
include('includes/header.php');
?>

<!-- Start of content -->
<!-- P3Q4 -->
<div>
    <h1>Insert Student</h1>

    <?php
    // https://www.w3schools.com/php/keyword_require_once.asp
    // require_once - include and evaluate the specified file only once
    require_once('includes/helper.php');
    
    // https://www.w3schools.com/php/func_var_empty.asp
    if (!empty($_POST)) // Something posted back.
    {
        // https://www.w3schools.com/php/func_string_strtoupper.asp
        $id      = strtoupper(trim($_POST['id']));
        $name    = trim($_POST['name']);
        $gender  = isset($_POST['gender']) ? trim($_POST['gender']) : null;
        $program = trim($_POST['program']);

        // Validations.
        // replace "?" to correct validations' functions
        $error['id']      = "?";
        $error['name']    = "?";
        $error['gender']  = "?";
        $error['program'] = "?";
        
        // NOTE:
        // -----
        // The validation functions are defined at "helper.php".

        // https://www.w3schools.com/php/func_array_filter.asp
        // replace "?" to correct build-in functions to remove null values in the $error
        $error = "?"; // Remove null values.

        // https://www.w3schools.com/php/func_var_empty.asp
        // empty - Determine whether a variable is empty
        if (empty($error)) // If no error.
        {
            ///////////////////////////////////////////////////////////////////
            // Database insert ////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            
            // NOTE:
            // -----
            // The query() + real_escape_string() methods will work too.
            
            // https://www.w3schools.com/php/php_mysql_connect.asp
            // connect MySQL database
            $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            // Replace ? with the SQL INSERT query
            $sql = '?';
            
            // https://www.php.net/manual/en/mysqli.prepare.php
            // Use mysqli_prepare() function and store it in the variable $stm
            
            
            // https://www.php.net/manual/en/mysqli-stmt.bind-param.php
            // Use mysqli_stmt_bind_param() function to bind the $id, $name, $gender, $program to the INSERT SQL query
            
            
            // https://www.php.net/manual/en/mysqli-stmt.execute.php
            // Run the SQL Query. Use mysqli_stmt_execute method
            
            
            // https://www.php.net/manual/en/mysqli-stmt.affected-rows.php
            // Replace false to make a condition statement that the affected rows are more than 0
            if (false)
            {
                printf('
                    <div class="info">
                    Student <strong>%s</strong> has been inserted.
                    [ <a href="list-student-Q3.php">Back to list</a> ]
                    </div>',
                    $name);

                // Reset fields.
                $id = $name = $gender = $program = null;
            }
            else
            {
                // Something goes wrong.
                echo '
                    <div class="error">
                    Opps. Database issue. Record not inserted.
                    </div>
                    ';
            }
            
            // https://www.php.net/manual/en/mysqli-stmt.close.php
            mysqli_stmt_close($stm);
            // https://www.w3schools.com/php/func_mysqli_close.asp
            mysqli_close($con);
            ///////////////////////////////////////////////////////////////////
        }
        else // Input error detected. Display error message.
        {
            echo '<ul class="error">';
            foreach ($error as $value)
            {
                echo "<li>$value</li>";
            }
            echo '</ul>';
        }
    }
    ?>

    <form action="" method="post">
        <table cellpadding="5" cellspacing="0">
            <tr>
                <td><label for="id">Student ID :</label></td>
                <td>
                    <input type="text" name="id" id="id" value="" maxlength="10">
                </td>
            </tr>
            <tr>
                <td><label for="name">Student Name :</label></td>
                <td>
                    <input type="text" name="name" id="name" value="" maxlength="30">
                </td>
            </tr>
            <tr>
                <td>Gender :</td>
                <td>
                    <input type="radio" name="gender" id="F" value="F">
                    <label for="F">Female</label>

                    <input type="radio" name="gender" id="M" value="M">
                    <label for="M">Male</label>
                </td>
            </tr>
            <tr>
                <td><label for="program">Program :</label></td>
                <td>
                    <select name="program" id="program">
                        <option value="">-- Select One --</option>
                        <option value="IA">Information Systems Engineering</option>
                        <option value="IB">Business Information Systems</option>
                        <option value="IT">Internet Technology</option>
                    </select>
                </td>
            </tr>
        </table>

        <input type="submit" name="insert" value="Insert" />
        <input type="button" value="Cancel" onclick="location='list-student.php'" />
    </form>
</div>
<!-- End of content -->

<?php
include('includes/footer.php');
?>