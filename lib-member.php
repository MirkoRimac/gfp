<?php 
    class Member {
        // Constructor - Connect to database
        private $pdo = null;
        private $stmt = null;
        public $error;
        function __construct() { try {
                $this -> pdo = new PDO(
                    "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
                    DB_USER, DB_PASSWORD, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]);
            } catch (Exception $ex) { exit($ex -> getMessage()); }}

            // Destructor - Close database connection
            function __destruct () {
                if($this -> stmt !== null) {$this -> stmt = null; }
                if($this -> pdo !== null) {$this -> pdo = null; }
            }

            // Query() - Helper to run SQL Query
            function query ($sql, $data = null) {
                $this -> stmt = $this -> pdo -> prepare($sql);
                $this -> stmt -> execute($data);
            }

            // Get() - Get member by ID or Email
            function get ($id) {
                $this -> query(sprintf("SELECT * FROM `members` WHERE `%s` =?", is_numeric($id) ? "id" : "email"), [$id]);
                return $this -> stmt -> fetch();
            }
            // Add() - Register new user        
            function add($name, $email, $password, $till = null) {
                // Check if Email already exists
                if($this -> get($email)) {
                    $this -> error = "$email is already registered";
                    return false;
                }

            // Save user into database
            $this -> query(
                "INSERT INTO `members` (`name`, `email`, `password`, `till`) VALUES (?, ?, ?, ?)",
                [$name, $email, password_hash($password, PASSWORD_DEFAULT), $till]
            );
            return true;
            }

            // Verify () - Verify Email and Password for login
            function verify ($email, $password) {
                // Get user 
                $member = $this -> get($email);
                $pass = is_array($member);

                // Check login expiry
                if($pass && $member["till"] != "") {
                    if(strtotime("now") >= strtotime($member["till"])) {
                        $pass = false;
                    }
                }

                // Check password
                if($pass) {
                    $pass = password_verify($password, $member["password"]);
                }

                // Register user into the session
                if($pass) {
                    foreach($member as $k => $v) {
                        $_SESSION["member"][$k] = $v;
                    }
                    unset($_SESSION["member"]["password"]);
                }

                // Return results
                if(!$pass) {
                    $this -> error = "Invalid email/password";
                }
                return $pass;
            }
    }

    // Database settings
    define("DB_HOST", "localhost");
    define("DB_NAME", "phplogin");
    define("DB_CHARSET", "utf8");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");

    // Start session 
    session_start();

    // Member object
    $_MEM = new Member();

    // Test - Add new user - OK
    //echo $_MEM -> add("Jon Doe", "jon@doe.com", "12345") ? "OK" : $_MEM -> error;

    // Test - Get user - OK
    //print_r($_MEM -> get(1));

    /*// Test - Verify user and login
    echo $_MEM -> verify("jon@doe.com", "12345") ? "OK" : $_MEM -> error;
    print_r($_SESSION);

?>*/