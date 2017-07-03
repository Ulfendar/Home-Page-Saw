<?php
/**
 * Created by IntelliJ IDEA.
 * User: edoardoc
 * Date: 19/04/2017
 * Time: 10:36
 */
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


<?php
include ("authentication.php");


    include("DBconnection.php");

    $current_user = $_SESSION['user'];

    $stmt = $conn->prepare("SELECT ID, Username, Email FROM users WHERE Email = ?");
    $stmt->bind_param('s', $current_user);

    $stmt->execute();

    $stmt->bind_result($id, $user, $email);
    $stmt->store_result();
    $stmt->fetch();


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
                <li><a href="#"></a></li>
                <li></li>
                <li class="current"><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- lo stesso stile inserito nella classe non funziona -->
    <div class="contenitore" style="display: flex;">

        <div style="width: 40%">
            <h1 id="title"> YOUR INFORMATION </h1>
            <label>Email:</label><label><?php echo $email; ?></label><br>
            <label>ID:</label><label><?php echo $id; ?></label><br>
            <label>Username:</label><label><?php echo $user; ?></label><br>
        </div>

        <div  style="width: 40%;">
        <form id="form-std" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
            <h1 id="title"> MANAGE YOUR PROFILE </h1>
            <label>Address</label><br>
            <input type="text" placeholder="" name="email" required/>
            <br><br>
            <label>Gender</label><br>
            <input type="radio" name="gender" value="male" checked> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other
            <br><br>
            <label>Birthday</label>
            <input type="date" name="bday">
            <br><br>
            <br><br>
            <input type="submit" class="botton-1" name="login" value="Save"/>
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
