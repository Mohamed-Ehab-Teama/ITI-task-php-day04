<?php

// require files
require_once './connection.php';


////////////////////////////////////////////////////////////////////////

// Get Method
if ($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        $_SESSION['error'] = 'Something went wrong. <br>You cannot access using GET method';
        header('location:login.php');
        exit();
}



////////////////////////////////////////////////////////////////////////

//if the user hits the submit button
if (isset($_POST['submit'])){


// fetch data
    foreach ($_POST as $key => $value)
    {
        $$key = $value;
    }

    // $userInEmail
    // $userInPassword


// test
    // echo $userInEmail;
    // echo "<br>";
    // echo $userInPassword;


////////////////////////////////////////////////////////////////////////

// check the connection with database 
    if (!$connection)
    {
        $_SESSION['error'] = 'Cannot connect to Database.';
        header('location:login.php');
        exit;
    }
    else
    {

        // encrypt password
        $userInPassword = md5($userInPassword);

        // get data from database
        $query = "select * from users where email = ? and pass = ? ";

        $sqlQuery = $connection->prepare($query);

        $sqlQuery->execute([$userInEmail, $userInPassword]);

        $result = $sqlQuery->fetch(PDO::FETCH_ASSOC);

        if($result)
        {

            foreach ($result as $key => $value)
            {
                $_SESSION[$key] = $value;
            }

            // $_SESSION['id']
            // $_SESSION['name']
            // $_SESSION['email']
            // $_SESSION['image']


            $_SESSION['login'] = true;
            $_SESSION['success'] = 'Login Successful';
            header('location:login.php');
            exit;
        }
        else
        {
            $_SESSION['error'] = 'Email or Password is incorrect';
            header('location:login.php');
            exit;
        }






    }













}

