<?php


// require files
require_once './connection.php';




// Get Method
if ($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        $_SESSION['error'] = 'Something went wrong. <br>You cannot access using GET method';
        header('location:register.php');
        exit();
}




// if press the submit button and sends the data
if (isset($_POST['submit'])){

    foreach ($_POST as $key => $value)
    {
        // hold variables
        $$key = trim(htmlspecialchars(strip_tags($value)));
        // $userName
        // $userEmail
        // $userPassword
        // $confirmPassword
        // $userImage
    }


// Test 
    // echo $userName, "<br>",
    //     $userEmail, "<br>",
    //     $userPassword, "<br>",
    //     $confirmPassword, "<br>",
    //     $userImage, "<br>";
    // exit;


//////////////////////////////////////////////////////////////////////////



// if empty fileds
    if (empty($userName))
    {
        $_SESSION['error'] = 'UserName is Required';
        header('location:register.php');
        exit;
    }
    elseif (empty($userEmail))
    {
        $_SESSION['error'] = 'Email is Required';
        header('location:register.php');
        exit;
    }
    elseif(empty($userPassword))
    {
        $_SESSION['error'] = 'Password is Required';
        header('location:register.php');
        exit;
    }
    elseif(empty($confirmPassword))
    {
        $_SESSION['error'] = 'The Confirmation of Password is Required';
        header('location:register.php');
        exit;
    }
    elseif(empty($userImage))
    {
        $_SESSION['error'] = 'Your Image is Required';
        header('location:register.php');
        exit;
    }



//////////////////////////////////////////////////////////////////////////


// validate and sanitize fileds
    if (!filter_var($userEmail,FILTER_VALIDATE_EMAIL))
    {
        $_SESSION['error'] = 'Please enter a valid Email';
        header('location:register.php');
        exit;
    }


    $userEmail = filter_var($userEmail, FILTER_SANITIZE_EMAIL);

//////////////////////////////////////////////////////////////////////////



// No Duplicate Emails
    if (!$connection)
    {
        $_SESSION['error'] = 'Cannot connect to Database.';
        header('location:register.php');
        exit;
    }
    else
    {
// check if emails exists before:

        $query = "select * from users where email = ? ";

        $sqlQuery = $connection->prepare($query);

        $sqlQuery->execute([$userEmail]);

        $result = $sqlQuery->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $_SESSION['error'] = 'Email already exists.';
            header('location:register.php');
            exit;
        }

    }



//////////////////////////////////////////////////////////////////////////



// Check if password and confirm password are the same
    if ($userPassword !== $confirmPassword)
    {
        $_SESSION['error'] = 'Password and confirm password must be the same';
        header('location:register.php');
        exit;
    }


//////////////////////////////////////////////////////////////////////////


// Password length
    if ( strlen($userPassword) < 3 || strlen($userPassword) > 16 )
    {
        $_SESSION['error'] = 'Password must be between 3 to 16 characters';
        header('location:register.php');
        exit;
    }




// encrypting password
    $userPassword = md5($userPassword);
    $confirmPassword = md5($confirmPassword);



//////////////////////////////////////////////////////////////////////////



// Storing data in database
    if (!$connection)
    {
        $_SESSION['error'] = 'Cannot store data. <br>Database Not Found.';
        header('location:register.php');
        exit;
    }
    else
    {
        // Inserting data to database:

        $query = "INSERT INTO users (name,email,pass,image) 
        VALUES(?, ?, ?, ?)";

        $sqlQuery = $connection->prepare($query);

        $sqlQuery->execute([$userName, $userEmail, $userPassword, $userImage]);


        $_SESSION['success'] = 'Registered Successfully';
        header('location:register.php');
        exit;



    }




//////////////////////////////////////////////////////////////////////////
















}