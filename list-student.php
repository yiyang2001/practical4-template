<?php
$PAGE_TITLE = 'Select Student';
include('includes/header.php');
?>

<!-- Start of content -->
<!-- P3Q6 -->
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

    // Validate program filter --> either IA, IB or IT.
    // Replace "?" to determine which program need to filter
    $program = "?";


    ///////////////////////////////////////////////////////////////////////////
    // Generate filter options ////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////

    echo '<p>Filter : ';
    /*
     * - Replace ? in <a href="?">%s</a> with the correct query string
     * - Replace ? in the printf()'s Argnum to the correct value
     */    
    printf('<a href="?">All Programs</a> ', "?", "?");
    foreach ($PROGRAMS as $key => $value)
    {
    /*
     * - Replace ? in <a href="?">%s</a> with the correct query string
     * - Replace ? in the printf()'s Argnum to the correct value
     */         
        printf('| <a href="?">%s</a> ',
               "?", "?", "?", "?");
    }
    echo '</p>';


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
                "?",
                "?", // To retain filter.
                $value,
                "?",      // Image.
                "?"); // Alt text.
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
                "?", // To retain filter.
                "?");
        }
    }
    echo '</tr>';


    ///////////////////////////////////////////////////////////////////////
    // Database select ////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // SQL with WHERE and ORDER BY clause.
    // Replace ? with the SQL SELECT query with ORDER BY 
    $sql = "?";

    if ($result = $con->query($sql))
    {
        while ($row = $result->fetch_object())
        {
            printf('
                <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                </tr>',
                $row->StudentID,
                $row->StudentName,
                $GENDERS[$row->Gender],
                $row->Program . ' - ' .$PROGRAMS[$row->Program]);
        }
    }

    printf('
        <tr>
        <td colspan="4">
            %d record(s) returned.
            [ <a href="insert-student.php">Insert Student</a> ]
        </td>
        </tr>',
        $result->num_rows);
    echo '</table>'; // Table ends.

    $result->free();
    $con->close();
    ///////////////////////////////////////////////////////////////////////
    ?>
</div>
<!-- End of content -->

<?php
include('includes/footer.php');
?>
