<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WidełkiPRO</title>
    <link rel="stylesheet" href="mainstyle.css">
    <link rel="icon" type="image/png" href="ikona.png">
</head>
<body>
    <div id="pasek1">
        <H1 id="logo"><a href="index.php"><img src="logo.png"></a></H1>
        <?php
            session_start();
                if (isset($_SESSION['login'])) {
                $login = $_SESSION['login'];
                echo "<span id=login-text>Witaj, $login!</span>";
            }
            //session_destroy();
        ?>
        <div id="logowanie">
            <a href="koszyk.html" target="myFrame" title="Koszyk"><img src="koszyk.png" id="smedia"></a>
            <?php
              if (isset($_SESSION['login'])) {
                echo '<a href="#" onclick="confirmLogout()" title="Wyloguj się"><img src="logout.png" id="smedia"></a>';
            } else {
                echo '<a href="logowanie.php" title="Zaloguj się"><img src="log.png" id="smedia"></a>';
            }
            ?>
            <a href="index.php" title="Strona Główna"><img src="home.png" id="home"></a>
        </div>
    </div>

    <div id="pasek2">
        <table id="tabela">
            <tr>
                <td class="tede">
                    <form action="nowosci.html" target="myFrame">
                        <button class="guzik1" data-height="900"><p id="napisguzik1">NOWOŚCI</p></button>
                    </form>
                </td>
                <td class="tede">
                    <form action="promocje.html" target="myFrame">
                        <button class="guzik1" data-height="900"><p id="napisguzik1">PROMOCJE</p></button>
                    </form>
                </td>
                <td class="tede">
                    <form action="wyprzedaze.html" target="myFrame">
                        <button class="guzik1" data-height="900"><p id="napisguzik1">WYPRZEDAŻE</p></button>
                    </form>
                </td>
                <td class="tede">
                    <form action="zestawy.html" target="myFrame">
                        <button class="guzik1" data-height="1040"><p id="napisguzik1">ZESTAWY</p></button>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    <iframe name="myFrame" id="okienko" src="polecane.html" scrolling="yes" onload="resizeIframe()">
    </iframe>

    <div id="footercontainer">

        <div id="footer">
            <a href="https://www.facebook.com" title="Odwiedź naszego Facebooka"><img src="fb.png" id="smedia"></a>
            <a href="https://www.instagram.com" title="Odwiedź naszego Instagrama"><img src="ig.png" id="smedia"></a>
            <a href="https://www.twitter.com" title="Odwiedź naszego Twittera"><img src="x.png" id="smedia"></a>
            <a href="https://www.tiktok.com" title="Odwiedź naszego TikToka"><img src="tt.png" id="smedia"></a>
        </div>
        
        <div id="footer2">
            <div id="ikonyprawo">
                <img src="tel.png">
            </div>
            <div id="contact">
                <p>529 492 784</p>
            </div>

            <div id="ikonyprawo">
                <img src="mail.png">
            </div>
            <div id="contact">
                <p>widelkipro@gmail.com</p>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function resizeIframe(height) {
        const iframe = document.getElementById('okienko');
        iframe.style.height = height + 'px';
    }

    const buttons = document.querySelectorAll('.guzik1');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const height = parseInt(this.getAttribute('data-height'));
            resizeIframe(height);
        });
    });
    function confirmLogout() {
        if (confirm("Czy na pewno chcesz się wylogować?")) {
            window.location.href = 'wyloguj.php';
        }
    }
</script>