<html xmlns="http://www.w3.org/1999/html">

<body>
<?php
$email = "";
$pw = "";
$username = "";

function check_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
};

function store_stream($stream){
    $my_file = "accounts.txt";
    $fhandler = fopen($my_file, "a");
    fwrite($fhandler, $stream);
    fclose($fhandler);
    return $stream;
};

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_btt"])) {
        $email = check_data($_POST["email"]);
        $pw = check_data($_POST["pw"]);
        $name = check_data($_POST["username"]);
        $stream = $email.",".$pw.",".$username."\n";
       // echo $stream;
        store_stream($stream);
    }
}

?>
Welcome <?php echo $username; ?> !<br>
Your account has been created.<br><br>
Return to <a href="index.php">home page</a>.


</body>

</html>
