<html xmlns="http://www.w3.org/1999/html">

<body>
<?php

$username = "";
$email = "";
$pw = "";
$confirm_pw ="";

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
        $username = check_data($_POST["username"]);
        $stream = $email.",".$pw.",".$username."\n";
       // echo $stream;
        store_stream($stream);
    }
}

?>
Welcome <?php echo $username; ?> !<br>
Your account has been created.<br><br>
Return to <a href="index.php">home page</a>.

/*   */
<?php
include("authentication.php");
include("DBconnection.php");

//flag di validazione form
$form_error = false;

//input sanitizing
if (isset($_POST['submit_btt'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pw = mysqli_real_escape_string($conn, $_POST['pw']);
    $confirm_pw = mysqli_real_escape_string($conn, $_POST['cpassword']);

//input validation
    if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
        $form_error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if (strlen($pw) < 5) {
        $form_error = true;
        $password_error = "Password must be minimum of 5 characters";
    }
    if ($pw != $confirm_pw) {
        $form_error = true;
        $cpassword_error = "Password doesn't match";
    }

//se il flag è FALSE: non ci sono errori e si procede all'inserimento
    if (!$form_error) {

//prepared statement: insert in tabella users
        $stmt = mysqli_stmt_prepare($conn, "INSERT INTO users VALUES (?,?,?)");
        mysqli_stmt_bind_param($stmt, sss, $username, $email, $pw);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

?>
</body>

</html>
