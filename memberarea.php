<!DOCTYPE html>
<html lang="it">
<?php

session_start();
if(!isset($_SESSION['user'])){
    header("Location:login.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="parole, chiave, per, la, indicizzazione, e , le , ricerche">
    <meta name="autori" content="Dovrebbe essere anonimo =P">
    <title>Tentative Hompage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />


</head>
<body>

<header>
    <div class="contenitore">
        <div id="logo"></div>
        <div id="titolo">
            <h1><span class="highlight">Progetto:</span> HomePage</h1>
            <!--Utilizzo span al posto di div, per evitare di andare a capo-->
        </div>
        <nav>
            <ul>
                <li class="current"><a href="index.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="login.php">Logout <span id="plain"> (<?php echo $_SESSION['user'];?>)</span></a></li>
            </ul>
        </nav>
    </div>
</header>




<div id="mapid">
    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>

    <!--S c r i p t   M A P P A  -->
    <script>

        var mymap = L.map('mapid').setView([44.40324, 8.97242], 13);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

    </script>
</div>

<!-- p a n e l -->

<div id="panell">
    <h4 id="title">SEGNALA IL TUO AVVISTAMENTO</h4>
    <h5>Ottimo <?php echo $_SESSION['user'] ?>!</h5> <br>
   Ora puoi effettuare la tua segnalazione!<br><br>
    <a href="memberarea.php"> <input class="botton-1" type="button" value="Segnala"></a>
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
