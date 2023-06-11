<!DOCTYPE html>
<html lang="hr">
<head>
    <?php
    session_start();
    $xml=simplexml_load_file("filmovi.xml");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Fletnix</title>
</head>
<body>
    <div id="container">
        <div class="content">
            <nav>
                <h1>Fletnix</h1>
                <a class="odjava" href="logout.php">Odjava</a>
            </nav>
            <div class="space"></div>
            <?php
            echo "<h2>Dobro došli ", $_SESSION['user'] ,"</h2>";

            ?>

            <h3>Zadnje gledano</h3>
            <table>
                <thead>
                    <tr>
                        <td>Naslov</td>
                        <td>Godina</td>
                        <td>Režiser</td>
                        <td>Oznake</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($xml->film as $film): ?>
                    <tr>
                        <td><?php echo $film->naslov; ?></td>
                        <td><?php echo $film->godina; ?></td>
                        <td><?php echo $film->reziser; ?></td>
                        
                     
                        <td><?php $tags = $film->tagovi;
                        if ($tags){
                        foreach ($tags-> tag as $tag):
                        echo $tag . ", "; ?>
                        <?php endforeach;} ?>
                        </td>
                        <td>
                            <button class="gumb">Nastavi gledati</button>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>

    
</body>
</html>