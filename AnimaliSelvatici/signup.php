
<?php

//se utente già loggato rimandato alla homepage
session_start();
if( isset($_SESSION['user'])!="" ){
    header("Location: memberarea.php");
}
include("DBconnection.php");


//var initialization
$name = $surname = $bday = $success = "";
$username = $email = $pw = $confirm_pw = "";


//flag di validazione form
$form_error = false;

$username_error = $email_error = $password_error = $confirm_error =  "";
$name_error = $bday_error = $surname_error = "";



//input sanitizing
if (isset($_POST['submit_btt'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pw = mysqli_real_escape_string($conn, $_POST['pw']);
    $confirm_pw = mysqli_real_escape_string($conn, $_POST['confirm_pw']);
    $bday =  $_POST['bday'];



//input validation
    if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
        $form_error = true;
        $username_error = "Special chars are not permitted";
    }

//prepared stmt: check user existence
    if($username_error == ""){
    $stmt = $conn->prepare("SELECT Username FROM users WHERE Username = ? ");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
     if($stmt->num_rows>0){
         $form_error = true;
         $username_error = "Username already exists!";
     }
     $stmt->close();
    }



    if (strlen($name) < 2 || strlen($name)>19){
        $form_error = true;
        $name_error = "Too long or short name";
    }


    if(!preg_match("/^[a-zA-Z ]*$/", $name)){
        $form_error = true;
        $name_error = "Only letters and spaces allowed";
    }


    if (strlen($surname) < 2 || strlen($surname)>19){
        $form_error = true;
        $surname_error = "Too long or short surname";
    }

    if(!preg_match("/^[a-zA-Z ]*$/", $surname)){
        $form_error = true;
        $surname_error = "Only letters and spaces allowed";
    }



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_error = true;
        $email_error = "Please enter valid email";
    }

/*
    if($bday >= date("d/ m/ Y")){
        $form_error = true;
        $bday_error = "Please enter valid email";
    }
*/

//prepared stmt: check email existence
    if($email_error == ""){
        $stmt = $conn->prepare("SELECT Username FROM users WHERE Email = ? ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows>0){
            $form_error = true;
            $email_error = "Email already exists!";
        }
        $stmt->close();
    }



    if (strlen($pw) < 5) {
        $form_error = true;
        $password_error = "Password is too short";
    }


    if ($pw != $confirm_pw) {
        $form_error = true;
        $confirm_error = "Password doesn't match";
    }

//se il flag è FALSE: non ci sono errori e si procede all'inserimento
    if (!$form_error) {

//password encryption
        $pw = hash('sha256', $pw);


//prepared statement: insert in tabella users
        $stmt = $conn->prepare("INSERT INTO users (Nome, Cognome, Data, Username, Email, Password) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $name, $surname, $bday, $username, $email, $pw);
        $stmt->execute();
        $stmt->close();

        $success = "L'account è stato creato con successo, verrai reindirizzato alla home in 5secondi...";
    }
}


?>

<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="parole, chiave, per, la, indicizzazione, e , le , ricerche">
    <meta name="autori" content="Dovrebbe essere anonimo =P">
    <title>Tentative Hompage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<header>
    <div class="contenitore">
        <div id="logo"></div>
        <div id="titolo">
            <h1><span  class="highlight"> <a href="index.php"> Progetto: HomePage </a></span></h1>
            <!--Utilizzo span al posto di div, per evitare di andare a capo-->
        </div>
        <nav>
            <ul>
                <li class="current"><a href="signup.php">Sign-up </a></li>
                <li></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>




        <form id="form-std" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"">

            <h1 id="title" align = middle> REGISTRATION </h1>
<div class="contenitore" style="display: flex;">
        <div style="width: 50%;">
            <div> <label>Nome</label></div>
            <span><input type="text" size="20%" name="name" placeholder="" required></span>
            <span class="error"><?php echo $name_error; ?></span><br><br>

            <div> <label>Cognome</label></div>
            <span><input type="text" size="20%" name="surname" placeholder="" required></span>
            <span class="error"><?php echo $surname_error; ?></span><br><br>

            <div> <label>Data di nascita</label></div>
            <span><input type="date" size="20%" name="bday" placeholder="" required></span>
            <span class="error"><?php echo $bday_error; ?></span><br><br>

        </div>

        <div style="width: 40%">
            <div> <label>Username</label></div>
            <span><input type="text" size="20%" name="username" placeholder="" required></span>
                    <span class="error"><?php echo $username_error; ?></span><br><br>


                <div> <label>Email</label></div>
                <span><input type="email" size="20%" name="email" placeholder="" required></span>
                    <span class="error"><?php echo $email_error; ?></span><br><br>


                <div> <label>Password</label></div>
                <span><input type="password" size="20%" name ="pw" placeholder="" required></span>
                    <span class="error"><?php echo $password_error; ?></span><br><br>


                <div> <label>Re-type password</label></div>
                <span><input type="password" size="20%" name = "confirm_pw" placeholder="" required></span>
                      <span class="error"><?php echo $confirm_error; ?></span><br><br>

        </div>

    <br>
    <?php echo $success; ?>
    <br><br>

    </div>


<div align="middle"><input type="submit" class="botton-1" name="submit_btt" value="Create Account" /> </div><br>







<section id="social">
    <div class="contenitore">
        <h1>Seguici</h1>

        <form>
            <input type="email" placeholder="Inserisci la tua mail per ">
            <button type="submit" class="botton-1">Invia</button>
        </form>
    </div>
</section>
<section id="scatole">
    <div class="contenitore">

        <div class="box">

            <div class="img"></div>
            <h3> Informazioni</h3>

            <p> Qui ci andrà qualcosa probabilmente, qualcosa di utile a cui non ho ancora pensato, magari anche qualche
                immagine!</p>
        </div>

        <div class="box">

            <div class="img"></div>
            <h3> Altre informazioni</h3>

            <p>Pure qui ci inseriremo qualcosa di utile o che faccia un po' di scena, cosí sembra un po' povero! </p>

        </div>

        <div class="box">
            <div class="img"></div>
            <h3> Altre informazioni ancora</h3>

            <p>Chissà se in questo spazio avremo ancora qualcosa da dire, per ora sicuramente no!</p>
        </div>

    </div>
</section>

<footer>
    <p> Seconda Consegna di Saw &copy; 2017</p>
</footer>
</body>
</html>