document.getElementById("teamBild").style.display = "none";

function teamBild() {

    let teamBild = document.getElementById("teamBild");
    
    if (teamBild.style.display = "block") {
        let clock = setInterval(() => {
            clearInterval(clock)
            clock = null
            teamBild.style.display = "none"
        }, 2000)
    }
}

// GOTCHA hellTobsen
function showAlert() {
    // Hell-Tobsen anzeigen
    var hellTobsen = document.querySelector(".hell-tobsen");
    hellTobsen.style.display = "block";

    //Timeout
    setTimeout(function() {
        hellTobsen.style.display = "none";
    }, 3000)
}

/* Register.php
<!-- <?php 

        if(isset($_POST["register"])) {

            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $hash = password_hash($password, PASSWORD_DEFAULT);

            //$username = $_POST["username"];
            //$password = $_POST["password"];

            if(!empty($username && $password)) {
                echo "$username <br> $password <br> $hash <br>"; 
            } else {
                echo "Invalid input";
            }
            
        }

    ?> --> */

    /* Login.php
    <?php 

        if(isset($_POST["login"])) {
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $hash = password_hash($password, PASSWORD_DEFAULT);

            //$username = $_POST["username"];
            //$password = $_POST["password"];

            if(!empty($username && $password)) {
                echo "$username <br> $password <br> $hash <br>"; 
            } else {
                echo "Invalid input";
            }
            
        }

    ?> */