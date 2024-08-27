<?php

require_once './connection.php';


if ($_SESSION['login'] != true)
{
    header('location:login.php');
    exit();
}


$id = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$image = $_SESSION['image'];

?>




<!--        View data        -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>


<h1 class="text-center mt-5"> <i>Profile Page</i> </h1>
<h3 class="text-center mt-5"> Welcome <?php echo $name ; ?> </h3>


<div class="card m-1 d-inline-block" style="width: 45rem;">
    <img src="<?php echo $image; ?>" class="card-img-top p-1" alt="User Image">
</div>

<div class="card m-1 d-inline-block" style="width: 45rem;">
    <h4 class="mt-0">ID: <?php echo $id ?></h4>
    <h4 class="mt-0">Name: <?php echo $name ?></h4>
    <h4>Email: <?php echo $email ?></h4>
</div>





</body>
</html>