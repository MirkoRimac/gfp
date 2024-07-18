<?php
    // Load PHP Library
    require "lib-member.php";

    // Check login input on submission
    if(count($_POST) != 0) {
        $_MEM -> verify($_POST["email"], $_POST["password"]);
    }

    // Redirect to user area if logged in
    if(isset($_SESSION["member"])) {
        header("Location: protected.php");
        exit();
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
    <h1 class="mb-3">Log in into the members area</h1>
    <form action="#" method="post">
        <label for="">Email:</label>
        <input type="email" name="email" class="mb-2" id=""><br>
        <label for="">Password:</label>
        <input type="password" name="password" class="mb-2" id=""><br>
        <input type="submit" name="login" class="mb-2" value="Log in"><br>
    </form>
</div>
</div>
</body>
</html>