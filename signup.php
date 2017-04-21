
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

<div align="center">
    <div class="contenitore">

        <form id="form-std" method="POST" action="created.php">

            <p> <h1 id="title"> REGISTRATION </h1>

            <label>Username</label><br>
            <input type="text" size="20%" name="username" placeholder="" required>
            <br><br>

            <label>Email</label><br>
            <input type="email" size="20%" name="email" placeholder="" required>
            <br><br>

            <label>Password</label><br>
            <input type="password" size="20%" name ="pw" placeholder="" required>
            <br><br>

            <label>Re-type password</label><br>
            <input type="password" size="20%" placeholder="" required><br><br>
            <br><br>
                <input type="submit" class="botton-1" name="submit_btt" value="Create Account" />
            <br><br>

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