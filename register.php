<?php require_once './connection.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<h1 class="text-center mt-5">Registeration page</h1>



<!-- If there an error -->
<?php if (isset($_SESSION['error'])): ?>

    <div class="alert alert-warning text-center">
        <?php echo $_SESSION['error']; ?>
    </div>

    <?php unset($_SESSION['error']); ?>

<?php endif; ?>
<!-- end of error display -->


<!-- In case of Success -->
<?php if (isset($_SESSION['success'])): ?>

    <div class="alert alert-success text-center">
        <?php echo $_SESSION['success']; ?>
    </div>

    <?php unset($_SESSION['success']); ?>

<?php endif; ?>
<!-- end of success display -->


<div class="container mt-5 p-5 border rounded border-dark-subtle">
    <form action="registerHandle.php" method="post">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="userName">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="userEmail">
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="userPassword">
        </div>
        
        <div class="mb-3">
            <label for="cpass" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpass" name="confirmPassword">
        </div>
        
        <div class="mb-3">
            <label for="photo" class="form-label">Upload Your Image</label>
            <input type="file" class="form-control" id="photo" name="userImage">
        </div>

        <div class="submitButton text-center">
            <button type="submit" class="btn btn-primary mt-3 p-2 w-25" name="submit">Register</button>
        </div>

    </form>

</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>