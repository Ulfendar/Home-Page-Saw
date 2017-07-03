
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


<?php
//se utente già loggato rimandato alla memberarea
// il link non dovrebbe esserci ma si puo' arrivare tramite barra di ricerca
session_start();
if( isset($_SESSION['user'])!="" ){
    header("Location: memberarea.php");
}
include("DBconnection.php");

//var initialization
$form_error = false;
$success = "";
$proceed = "Success!<br> You will redirect to home in 5sec...";
$email = "";
$pw = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = mysqli_real_escape_string($conn, $_POST['pw']);

        $pw = hash('sha256', $pw);
        $stmt = $conn->prepare("SELECT Email, Password FROM users WHERE  Email = ?  AND Password = ? ");
        $stmt->bind_param('ss', $email, $pw);
        $stmt->execute();
        $stmt->bind_result($email, $pw);
        $stmt->store_result();
        //se il risultato della query è 1 e una sola riga
        if($stmt->num_rows==1){
            $success = "Success!<br> You will redirect to home in 5sec...";

            if (isset($_POST['checkbox'])) {
                setcookie("user", $email, time() + 3600);
                header("refresh:4 ; memberarea.php");

            }

            $_SESSION['user'] = $email;
            $_SESSION['logged'] = 1;
            header("refresh: 4; memberarea.php");

        } else{
            $form_error = true;
            $success = "Email or password are wrong!";
        }
        $stmt->free_result();
        $stmt->close();

    }


}



?>


<header>
    <div class="contenitore">
        <div id="logo"></div>
        <div id="titolo">
            <h1><span  class="highlight"> <a href="index.php"> Progetto: HomePage </a></span></h1>
            <!--Utilizzo span al posto di div, per evitare di andare a capo-->
        </div>
        <nav>
            <ul>
                <li><a href="signup.php">Sign-up </a></li>
                <li></li>
                <li class="current"><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<div align="center">
    <div class="contenitore">

        <form id="form-std" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >

            <p><h1 id="title"> LOGIN </h1>

                <label>Email</label><br>
            <input type="email" placeholder="" name="email" required/>
                <br><br>
                <label>Password</label><br>
            <input type="password" placeholder="" name="pw" required/>
                <br><br>
            <label id="smaller"><input type="checkbox" name="checkbox"/> Remember me</label>
            <br>
            <span class="error"><?php echo $success; ?></span> </td>
            <br><br>
            <input type="submit" class="botton-1" name="login" value="Login"/>
            <div>
                <?php

                ?>
            </div>

        </form>
        </div>
</div>


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