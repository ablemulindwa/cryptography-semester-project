<?php

//Start my session so that variables are persistent
session_start();

//Message session variable to store encrypted message
$_SESSION['message'] = null;

//$_SESSION['done'] = null;

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Encrypt Me!</title>
</head>
<body>
    <header>
        <div class="header-ribbon">
            <img id="enc-logo" src="logo.png" alt="Encrypt Me! logo"></img>
            <h1>Encrypt Me!</h1>
        </div>
    </header>
    <main>
        <h2 class="enc-headings">Welcome to Encrypt Me!</h2>
        <p>
            Encrypt Me is a service dedicated to facilitating free and secure communication over the internet.
        </p>
        <h2 class="enc-headings">How It Works</h2>
        <p> 
            Encrypt Me works by taking a message from the form and converting it into cypher text. 
            The service also allows you to send a decryption key to your intended recipient via SMS.
            The message can be shared with the recipient using the conventional methods of communication, 
            for example through WhatsApp messaging or email.
        </p>
        <h2 class="enc-headings">Getting Started</h2>
        <p>Just enter your intended message in the text box below, then press the Encrypt button.</p>
        <p>Or if you would like to decrypt a message sent to you, press the Decrypt button.</p>
        
        <!--Block for input and encryption elements-->
        <div id="form-container">
            <form id="enc-form" action="/Files/test.php" method="post">

                <!--Text area for collection of user inputted message-->
                <textarea id="enc-textbox" type="text" name="message">Encrpyt your text here...</textarea>

            </form>

            <!--Encryption buttons-->
            <div class="enc-btns">
                    
                    <!--Encrypt button-->
                    <button type="submit" form="enc-form" value="Submit" class="enc-button">Encrypt</button>
                    
                    <!--Startover button-->
                    <button type="submit" name="clear" value="clear" onclick="clear()" class="enc-button">Start over</button>
                    
                    <!--Startover function
                    <?php
                        //Clear session function
                            function clear(){
                                if (isset($_SESSION['message']) && isset($_SESSION['key']) && isset($_POST['clear'])){
                                    session_unset();
                                    session_destroy();
                                }
                            }
                    ?>
            </div>
            
            <!--HTML/PHP block for obtaining a generated key-->
            <p class="finished-output">
                <?php
                    //If done encrypting, paste the key somewhere where the user can see it.
                    if(isset($_SESSION['key'])) {
                        echo "Generated Key: " . $_SESSION['key'];
                    }
                    else {
                        echo "No generated Key";
                    }
                ?>
            </p>

        </div>
        
         

        <!--Block 2
        <form id="enc-form1" action="/Files/test.php" method="post">

            <textarea id="enc-textbox" name="mymessage">Your encryption/decryption key here...</textarea>

            <div class="enc-btns">
                <button class="enc-button">Generate key</button>
            </div>
        </form>-->

        <!--
        <form id="dec-form" action="/test.php" method="post">

            
            <textarea id="enc-textbox" name="decmessage">Enter your message...</textarea>
            

            <div class="enc-btns">
                <button class="enc-button">Decrypt</button>
            </div>
        </form>-->

    </main>
    <footer>
        <p class="footer-txt">Copyright © 2024. All rights reserved.</p>
    </footer>
</body>
</html>