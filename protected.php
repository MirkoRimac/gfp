<?php
  // Load PHP Library
  require "lib-member.php";

  // Process log out
  if(isset($_POST["out"])) {
      unset($_SESSION["member"]);
  }

  // Check session status and redirect if not logged in
  if(!isset($_SESSION["member"])) {
      header("Location: login.php");
      exit();
  }

  // Print session data for debugging (comment out when not needed)
    print_r($_SESSION["member"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php 
        include("header.html");
    ?>

<div class="container text-center">
    <?php 
        $name = $_SESSION["member"]["name"];
        echo "<h1>Welcome $name, to the members area</h1> <br>";

    ?>

    <?php
        print_r($_SESSION);
    ?>

    <!-- Log out -->
    <form method="post">
      <input type="hidden" name="out">
      <input type="submit" value="Log out">
    </form>

    <!-- Websites & Apps -->
    <div class="container">
        <h4>Websites & Apps</h4>
        <div class="container-fluid text-center">
            <!-- 1 Reihe -->
            <div class="row justify-content-center mb-3">
                <div class="col-auto"><a href="https://app.asana.com/0/home/1206816080257901" target="_blank"><img class="app-symbol" src="./img/asana.png" alt=""></a></div>
                <div class="col-auto"><a href="https://drive.google.com/drive/folders/18TR9MDsOP8wgkzhvSeG_-b4gbGZYRUet?usp=sharing" target="_blank"><img class="app-symbol" src="./img/cloud.png" alt=""></a></div>
                <div class="col-auto"><a href="https://lernplattform.gfn.de/" target="_blank"><img class="app-symbol" src="./img/gfn.png" alt=""></a></div>
                <div class="col-auto"><a href="https://mail.google.com/mail/u/0/#inbox" target="_blank"><img class="app-symbol" src="./img/gmail.png" alt=""></a></div>
            </div>       
                            
            <!-- 1 Reihe Ende -->
    
            <!-- 2 Reihe -->
            <div class="row justify-content-center mb-3">
                <div class="col-auto"><a href="onenote:https://1drv.ms/o/s!AjpwrypdoKvnhZxbxkvPiMUWNSJUVw?e=V34eyc"><img class="app-symbol" src="./img/onenote.png" alt=""></a></div>
                <div class="col-auto"><a href="msteams:chat/19:63550836eaf6443b8d14a30063706fd4@thread.v2?ctx=chat"><img class="app-symbol" src="./img/teams.png" alt=""></a></div>
                <div class="col-auto"><a href="whatsapp://open/"><img class="app-symbol" src="./img/whatsapp.png" alt=""></a></div>
                <div class="col-auto"><a href="https://web.telegram.org/" target="_blank"><img class="app-symbol" src="./img/telegram.png" alt=""></a></div>
            </div> 
            <!-- 2 Reihe Ende -->
    
            <!-- 3 Reihe -->
            <div class="row justify-content-center">
                <div class="col-auto"><a href="https://chat.openai.com/" target="_blank"><img class="app-symbol" src="./img/chat-gpt.png" alt=""></a></div>
                <div class="col-auto"><a href="https://www.canva.com/" target="_blank"><img class="app-symbol" src="./img/canva.png" alt=""></a></div>
                <div class="col-auto"><a href="https://www.photopea.com/" target="_blank"><img class="app-symbol" src="./img/photopea.png" alt=""></a></div>
                <div class="col-auto"><a href="#"><img class="app-symbol" src="./img/steam.png" alt="" onClick="showAlert()"></a></div>
            </div>
            <!-- 3 Reihe Ende -->
        </div>
    </div>
<!-- Websites & Apps Ende -->

<!-- Wichtige Infos -->
    <div class="container mt-5">
        <h4>Wichtige Informationen</h4>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus molestias, voluptatum velit at aliquam iure dolores quam soluta deserunt ad id, porro hic voluptate eveniet nobis quo. Libero, aperiam mollitia!</p>
    </div>
<!-- Wichtige Infos Ende -->

<!-- Kalender -->
    <div class="container mt-5">
        <h4>Kalender</h4>
        <div class="responsive-iframe-container big-container">
            <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=UTC&bgcolor=%23ffffff&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZGUuZ2VybWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZjRjZWZjOTgzMTJjNzFiNzY0NTNkM2IyNDU3ZmI2YzRkY2U4NDg0ZmU1MmJmNDgzZmNhOTBiOGUwZjFhMWQ2NUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=NjM4NzMzOGM0NTUwMjZjOTliNmQzMTk0MjdiNTU0ZWVjNjJhNjZhMzg2OGYzOTlmODk0N2EyZmRiNmI2ZjA5YkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=NDUzM2U2NTU3YjJjYmY0YmYzNTQxMGM2Y2VkYmUzMzkwYmY5YTNkOTZlZDg1OGJhZGU3MWExNmJiNjFkZmVhMEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=YWZlZTU1OTYyYTRhNWU1ZGU4OWZiNjBiYzBmYmY5OWRkZDY0Zjg4MWI4NDZiNjFiZGRiODBiZjVlNGZlMjBjNUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=NzMyZTA3Mzk2N2RlMGU5MjgxMDY5MTJjNjY0NjBhZjlmNDNmN2IzZDI5YmEyNTNkNDA1NTY0NTg0MGUyNmY1NEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=YzNiYTA0Y2RkZDE5MzkxNDY5MjIxMWVkMTJlZWZmODFiMGYyMjBjYmY2NTllM2E0YTI3ZjY3MDBhOWE4YzA2NEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=OGIwNmVkNzYxNzE0NWRlYjdjMGEyNWM2NDBlZDVjZmI3NzVjODcwZTFmZjc2ODI3MWQ0NjY2NzRhNzM3ZTU3N0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=ZGNmNTYxYWI5ZjU0OGJiYzUxMzRhNDc1MjY5ZDI1MTVhYjBjNDliMDM1ZDk2N2QwOTgzOWQzZTYzYjlkMzI5NUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=ZTlkZDNhZGNlZWE5N2I5OGNkMzhlNmE1MTIwODAzZjI3YmM3NmViYTJiNmQwY2MxODlhZGQwZTk5ZjA4YmMxOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=MzdkYzY0MzNiYzE0YTUyMzQ0MTA2ZmY4ZTFkMzZhOWNkYWU1NTI3MjhmN2Y3ODlhNDNiZWM0Mjg3NWM2MTQzM0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Zjc0NjhmYjdmNDE1MzAwYWY5ODZiNmQ4ZjVhZTY5YWMyZGVjYTM3ZWY2OTYwN2NkZTIzZmFmNzg5MWJhODdkN0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=ZDgwM2ZiMWVhMGI4MjI0OTMzOWZiNmFkZGM5MmZiMmE2ZWRmZjEwMzUwY2ZkYzA3MWI2ZDI4NWVkZDU5ZjEwNkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y2Y4NmVmNWJiY2MzMDdlNWQ4NTc2NzcxNjUyMWQ2OWEwNDI0ZmE0ZDllOTc0NThjZTEyMWE2NTBjNjQ4OTdjZkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=MGI4OGE3ZmZhZWZjZjRhMWQyMGZjZDE5OWEwMjg1YjE2ZTU1ZDYyOWY2YWIwMmQzYWEyYTczNzA0N2NiNWZkMkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=YWIyNDllOGI0YjljNTViNWEyZDNjNDdlYTVmZThlMTg0Nzg0ZjI2YWJmYTVlZmEzODcyMGQ0MWYyZWYxMDBmZEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=OWYwMjJlYTFlNmQ0NjY5YjE1MDI0ZTYyNTEyNWEyMWZlMGQxMTEzNzM1NTQ4ODllNTQ1ZTVjMWRjOWFlZWZmY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=M2RmZThlOWZlMzAxZmI1ZjA5MTNlNDU1ZmY2MWJkOGEzY2I4ODQ3NGJiMmQ3N2M0NjAyZTJiZGIyZTI0ZGI3M0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=NzZjMTQ5Zjg3YmIzYzI2YjQwMjViMmZiZWYwNDcyOWNkZTE5NzVkMGQ3YzdkYjg3ZDJkZGJlZTAxYjc4NTY3ZEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%2333B679&color=%230B8043&color=%23AD1457&color=%23E67C73&color=%23009688&color=%238E24AA&color=%23795548&color=%23A79B8E&color=%23B39DDB&color=%23F6BF26&color=%23B39DDB&color=%23B39DDB&color=%23F6BF26&color=%23B39DDB&color=%23D81B60&color=%23B39DDB&color=%23A79B8E&color=%23E67C73&color=%23009688&color=%23E67C73" style="border-width:0" width="100%" height="800" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
<!-- Kalender Ende -->

<!-- Footer -->
<div class="hell-tobsen"><img src="./img/hell-tobsen.png" style="width: 370px;" alt=""></div>

<!-- Teambild -->
<!--<div class="container">
    <button id="unserTeam" onclick="teamBild()">Unser Team</button>
    <div id="teamBild">
    <img src="./img/NetworkSmurfs.png" alt="">
    </div>
</div>-->
<!-- Teambild Ende -->

<!-- Footer Ende -->

<!-- JavaScript -->
    <script src="./script.js"></script>
</div>
</body>
</html>