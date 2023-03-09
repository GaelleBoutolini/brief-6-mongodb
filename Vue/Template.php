<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Tools/style/Template.css" rel="stylesheet">
    <link href="<?= $style ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./Tools/image/favicon.png" type="image/x-icon">
    <title><?= $title ?></title>
</head>

<body>

    <!-----------------------------------header -->
    <header>
        <div id="header">
            <div id="logoDivHeader">
                <img id="logoImage" src="./Tools/image/logoIcon.png">
                <h1 id="logoText">Equilibra</h1>
            </div>

            <?= $logout ?>
            
        </div>

    </header>
    <!-----------------------------------main -->
    <?= $contenu ?>
    <!-----------------------------------footer -->
    <footer>
        <div class="logo">
            <div id="logoDivFooter">
                <img id="logoImage" src="./Tools/image/logoIcon.png">
                <p id="logoText">Equilibra</p>
            </div>
        </div>

        <div id="footerText">
            <div id="footerTextLeft">
                <p>EQUILIBRA SARL.</p>
                <p>CHU Grenoble</p>
                <p>34 Av. de l'Europe</p>
                <p>38100 Grenoble</p>
            </div>
            <div id="footerTextRight">
                <p>Téléphone : 04&nbsp;01&nbsp;11&nbsp;12&nbsp;00</p>
                <p>Mail : <a href="mailto:equilibra@gmail.fr">equilibra@services.fr</a></p>
                <p>Suivez-nous :
                    <span class="network-links">
                        <a href="http://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </span>
                </p>
            </div>
        </div>

    </footer>
</body>

</html>