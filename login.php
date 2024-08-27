<?php require_once './connection.php'; ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<h1 class="text-center mt-5">Login page</h1>


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

    <?php header('refresh:2; url=profile.php') ?>

<?php endif; ?>
<!-- end of success display -->



<div class="container mt-5 p-5 border rounded border-dark-subtle">
    <form action="loginHandle.php" method="post">

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="userInEmail">
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="userInPassword">
        </div>

        <div class="submitButton text-center">
            <button type="submit" class="btn btn-primary mt-3 p-2 w-25" name="submit">Login</button>
        </div>

    </form>

</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>