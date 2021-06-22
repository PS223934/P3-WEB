<?php
    include_once "./classes/vdb.php";
    $db = new vdb();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>verkiezingen</title>
        <link rel="stylesheet" href="style/style.css">
        <script src="js/vk.js"></script>
    </head>
    <body>
        <ul id='navul'>
            <li onclick="redirect('index.php')" class="navitem" id="homebtn"><p>⌂</p></li>
            <li class="navitem hoverdiv navselected">
             
                <a href="partijen.php"><p id="spnav">partijen</p></a>
            
                <div class="hoverbox"> 
                    <?php
                        $rows = $db->GetPartijen();

                            foreach($rows as $row) {

                            echo "
                                <div onclick=redirect('Partijen.php?id=$row[PartijId]') class='hoverbox-content'>
                                    <p>$row[PartijName]</p>
                                </div>
                                ";
                        }
                        ?>
                    </div>
                </li>
                <li onclick="redirect('verkiezingen.php')" class="navitem"><p>verkiezingen</p></li>
                <li onclick="redirect('themas.php')" class="navitem"><p>thema's</p></li>
            </ul>

            <div id="content">
                <div id="contentcontainer">
                    <?php

                    if (empty($_GET)) {
                        echo "
                            <h1>Partijen</h1>
                        ";

                        $content = $db->GetPartijen();

                        foreach($content as $row) {

                            echo "
                                <div class='partijcontainer' onclick=redirect('partijen.php?id=$row[PartijId]')>
                                    <h1>$row[PartijName]</h1>
                                </div>
                            ";

                        }
                    }
                    else {
                        $pid = $_GET['id'];
                        $content = $db->GetPartijDetails($pid);

                        foreach($content as $row) {

                            echo "
                                <h1>$row[PartijName]</h1>
                                <h2>Herkomst:</h2>
                                <p><b>Gemeente:</b>  $row[Gemeente]<p>
                                <p><b>Adres:</b>  $row[Adres]<p>
                                <p><b>Postcode:</b>  $row[Postcode]<p>
                                <br>
                                <h2>Contact informatie:</h2>
                                <p><b>Email Adres:</b>  $row[EmailAdres]<p>
                                <p><b>Telefoonnummer:</b>  $row[Telefoonnummer]<p>
                            ";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>
