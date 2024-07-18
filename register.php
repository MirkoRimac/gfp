<?php
    require "lib-member.php";

    // Already logged in - redirect to user area
    if(isset($_SESSION["member"])) {
        header("Location: protected.php");
        exit();
    }

    // Process registration on submission
    if(count($_POST) != 0) {
        if($_MEM -> add($_POST["name"], $_POST["email"], $_POST["password"])) {
            header("Location: login.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GfN | Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include("header.html");
    ?>
<div class="container">
<div class="container-fluid text-center mt-5">
<h1 class="mb-3">Create a new account:</h1>
    <form method="post">
        <label for="">Name:</label>
        <input type="text" name="name" class="mb-2" id=""><br>
        <label for="">Email:</label>
        <input type="email" name="email" class="mb-2" id=""><br>
        <label for="">Password:</label>
        <input type="password" name="password" class="mb-2" id=""><br>
        <input type="submit" name="register" class="mb-2" value="Register"><br>
    </form>
</div>
</div>
</body>
</html>