<!DOCTYPE html>
<html lang="hr">
<head>
    <?php 
    session_start();
    $xml=simplexml_load_file("users.xml");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Login</title>
</head>
<body>
    <div id="formbox">
    <form method="post">
        Korisničko ime:<br/>
        <input type="text" class="input" name="user"/><br/>
        Lozinka:<br/>
        <input type="password" class="input" name="pass"/><br/>
        <input type="submit" name="send" class="send" value="Ulogiraj me"/>
    </form>
    </div>

    <?php
    
    if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['send'])){
        $username = $_POST['user'];
        $password = $_POST['pass'];

        
        foreach ($xml->user as $usr){
            $korIme = $usr->korisnicko_ime;
            $loz = $usr->lozinka;

           
            if($korIme == $username){                
                if($loz == $password){
                    
                    echo "<div class='poruka'>Prijavljeni ste kao ", $username, ". <a href='fletnix.php'>Odvedi me na naslovnicu.</a></div>"; 
                    $_SESSION['user'] = $username;
                    
                }
            }
        }
    }




    ?>
    
</body>
</html>