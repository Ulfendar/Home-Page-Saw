
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
session_start();


function checklogin($email, $pw)
{
    $present = false;
    $file = "accounts.txt";
    $file = fopen($file, "r");
   // rewind($file);
    while (!feof($file)) {
        $line = fgets($file);
        $finder = explode(',', $line);

        if ($finder[0] == $email) {
            if ($finder[1] == $pw) {
                $present = true;
            }
        }
    }
    if ($present == true) {
   return true;
    } else {
        return false;
    }
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])){
        $user = $_POST['email'];
        $pw = $_POST['pw'];
        if(checklogin($user,$pw)==true) {
            if (isset($_POST['checkbox'])) {

                setcookie("new_cookie", $user, time()+3600);
                $_SESSION['user'] = $user;
                $_SESSION['pw'] = $pw;
                // echo "login successful!";
                header("Location: memberarea.php");
                die();
            }
        }else { echo "Wrong email or password";}
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
            <br><br><br>
            <input type="submit" class="botton-1" name="login" value="Login"/>
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