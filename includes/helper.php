<?php
///////////////////////////////////////////////////////////////////////////////
// Database connection details ////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

// Constants. Please change accordingly.
// Replace the ? to correct value
define('DB_HOST', '?');
define('DB_USER', '?');
define('DB_PASS', '?');
define('DB_NAME', '?');

///////////////////////////////////////////////////////////////////////////////
// Lookup tables //////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
// Lookup tables are used to validate and display data in the form.

// P3Q3 List Student – Version 2
// Return an array of all states.
function getPrograms()
{
    return array(
        'IA' => 'Information Systems Engineering',
        'IB' => 'Business Information Systems',
        'IT' => 'Internet Technology'
    );
}

// Return an array of all genders.
function getGenders()
{
    return array(
        'F' => 'Female',
        'M' => 'Male'
    );
}

// Array versions of lookup tables.
$PROGRAMS = getPrograms();
$GENDERS = getGenders();

///////////////////////////////////////////////////////////////////////////////
// Validators /////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

// Validate Student ID.
// Return nothing if no error.
function validateStudentID($id)
{
    // check if the student ID is empty
    if ($id == null)
    {
        return 'Please enter <strong>Student ID</strong>.';
    }
    // check if the student ID is not in the correct format (99XXX99999)
    else if (!preg_match('/^\d{2}[A-Z]{3}\d{5}$/', $id))
    {
        return '<strong>Student ID</strong> is of invalid format. Format: 99XXX99999.';
    }
    // check if the student ID is already exist in the database
    else if (isStudentIDExist($id))
    {
        return '<strong>Student ID</strong> given already exist. Try another.';
    }
}

// Check if Student ID already exist in the database.
// Used by function validateStudentID().
function isStudentIDExist($id)
{
    $exist = false;
    
    // https://www.w3schools.com/php/php_mysql_connect.asp
    // connect MySQL database
    
    
    // https://www.w3schools.com/php/func_mysqli_real_escape_string.asp
    // https://stackoverflow.com/questions/6327679/what-does-mysql-real-escape-string-really-do
    // replace the ? to the method to use real_escape_string
    $id  = '?';
    
    // replace ? to SQL SELECT query
    $sql = "?";

    // run the query and check the query whether running successfully and assign to the variable $result
    if (true)
    {
        // Check the num of row is more than 0
        if (true)
        {
            $exist = true;
        }
    }
    
    // https://www.w3schools.com/php/func_mysqli_free_result.asp
    $result->free();
    // https://www.w3schools.com/php/func_mysqli_close.asp
    $con->close();

    return $exist;
}

// Validate Student Name.
// Return nothing if no error.
function validateStudentName($name)
{
    if ($name == null)
    {
        return 'Please enter <strong>Student Name</strong>.';
    }
    else if (strlen($name) > 30) // Prevent hacks.
    {
        return '<strong>Student Name</strong> must not more than 30 letters.';

    }
    else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $name))
    {
        return 'There are invalid letters in <strong>Student Name</strong>.';
    }
}

// Validate Gender.
// Return nothing if no error.
function validateGender($gender)
{
    if ($gender == null)
    {
        return 'Please select a <strong>Gender</strong>.';
    }
    else if (!array_key_exists($gender, getGenders())) // Prevent hacks.
    {
        return 'Invalid <strong>Gender</strong> code detected.';
    }
}

// Validate Program.
// Return nothing if no error.
function validateProgram($program)
{
    if ($program == null)
    {
        return 'Please select a <strong>Program</strong>.';
    }
    else if (!array_key_exists($program, getPrograms())) // Prevent hacks.
    {
        return 'Invalid <strong>Program</strong> code detected.';
    }
}

?>
