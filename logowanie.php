<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WidełkiPRO</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="icon" type="image/png" href="ikona.png">
</head>
<body>
    <div id="kwadrat">
        <div id="napis">
            <H1 id="logo"><a href="index.php"><img src="logo.png"></a></H1>
        </div>
        <div id="wpisy">
            <table id="tabela">
                <tr>
                    <td class="tede">
                    <?php
                        session_start();

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "widelki";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Połączenie nieudane: " . $conn->connect_error);
                        }
                        $loginError = "";

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $login = $_POST['login'];
                            $haslo = $_POST['haslo'];

                            $sql = "SELECT * FROM uzytkownicy WHERE login = '$login' AND haslo = '$haslo'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $_SESSION['login'] = $login;
                                $_SESSION['success_message'] = "Zalogowano pomyślnie!";
                                header("Location: index.php");
                                exit();
                            } else {
                                $loginError = "Błąd logowania: Nieprawidłowy login lub hasło!";
                            }
                        }

                        $conn->close();

                    ?>
                        <form method="post" action="logowanie.php">
                            <small><?php echo $loginError; ?></small><br>
                            <input type="text" name="login" placeholder="Login" required class="input" id="napisinput"><br><br>
                            <input type="password" name="haslo" placeholder="Hasło" required class="input" id="napisinput"><br><br>
                            <input type="submit" value="ZALOGUJ" class="guzik1" id="napisguzik1">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="tede">
                        <a href="rejestracja.php"><input type="submit" value="Nie masz konta?" class="guzik1" id="napisguzik1"></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>