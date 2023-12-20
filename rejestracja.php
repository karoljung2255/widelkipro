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
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "widelki";


                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Połączenie nieudane: " . $conn->connect_error);
                        }

                        $loginError = $passwordError = "";
                        $LoginSuccess = "";

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $login = $_POST['login'];
                            $haslo = $_POST['haslo'];
                        
                            if (strlen($login) < 3) {
                                $loginError = "Login musi mieć co najmniej 3 znaki!";
                            }
                        
                            if (strlen($haslo) < 8 || !preg_match('/^(?=.*\d).{8,}$/', $haslo)) {
                                $passwordError = "Hasło musi zawierać co najmniej jedną cyfrę i być długości co najmniej 8 znaków!";
                            }
                        
                            if (empty($loginError) && empty($passwordError)) {
                                $sql = "INSERT INTO uzytkownicy (login, haslo) VALUES ('$login', '$haslo')";
                        
                                if ($conn->query($sql) === TRUE) {
                                    $LoginSuccess = "Rejestracja udana!";
                                } else {
                                    echo "Błąd podczas rejestracji: " . $conn->error;
                                }
                            }
                        }
                        $conn->close();
                        ?>
                        <form action="" method="post">
                            <small><?php echo $LoginSuccess; ?></small><br>
                            <input type="text" name="login" placeholder="Login (minimum 3 znaki)" required class="input" id="napisinput"><br>
                            <small style="color: red;"><?php echo $loginError; ?></small><br>
                            <input type="password" name="haslo" placeholder="Hasło (minimum 8 znaków, 1 cyfra)" required class="input" id="napisinput"><br>
                            <small style="color: red;"><?php echo $passwordError; ?></small><br>
                            <input type="submit" value="ZAREJESTRUJ" class="guzik1" id="napisguzik1">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="tede">
                        <a href="logowanie.php"><input type="submit" value="Masz już konto?" class="guzik1" id="napisguzik1"></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>