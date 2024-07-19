<?php

//Start my session so that variables are persistent
session_start();

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
            Encrypt Me works by taking a <b>message</b> from the form and converting it into <b>cypher text</b>.
            The service also allows you to generate a secure <b>decryption key</b>, which can then be securely sent to your intended recipient via SMS.
            The resulting <b>encrypted message</b> can be shared with the recipient using more conventional methods of communication, 
            for example through WhatsApp messaging or email, ensuring that even if it is intercepted, 
            <b>the attackers will be unable to decypher</b> the cipher text.
        </p>
        <h2 class="enc-headings">Getting Started</h2>
        <p>Just enter your intended message in the text box below, then press the <b>Encrypt</b> button.</p>
        <p><b>PLEASE!</b> remember to save the <b>Encrypted message</b> in order to avoid losing access to your data.</p>
        
        <!--Block for encryption elements-->
        <div id="form-container">
            <form id="enc-form" class="enc-form" action="/Files/test.php" method="post">

                <!--Text area for collection of user inputted message-->
                <textarea id="enc-textbox" type="text" name="message" placeholder="Enter your message here..."><?php 
                    echo trim($_SESSION['message']);
                ?></textarea>

            </form>

            <!--Encryption buttons-->
            <div class="enc-btns">
                    
                    <!--Encrypt button-->
                    <button type="submit" form="enc-form" value="Submit" class="enc-button">Encrypt</button>
                    
                    <form method="post">
                        <!--Startover button-->
                        <button type="submit" name="clear" value="clear" onclick="clear()" class="enc-button">Start over</button>
                    </form>

                    <!--TODO: Startover function-->
                    <?php
                        //Clear session function                        
                        if (isset($_SESSION['message']) && isset($_SESSION['key']) && isset($_POST['clear'])){
                            session_unset();
                            session_destroy();
                            session_start();
                        }
                    ?>
            </div>
            
            <!--HTML/PHP block for obtaining a generated key-->
            <div>
                <!---->
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

            <!--TODO: HTML block for sending the encryption key to another user-->
            <div class="send-key">
                <form id="sms-form" class="enc-form" action="/Files/sms.php" method="post">
                    <!--Input box for sending key to other user-->
                    <div id="key-box">
                        <label for="key" id="key-text">Enter Phone Number: </label>
                        <input type="text" id="key-pwd" name="key"></input>
                    </div>

                    <!--Send decryption key to Phone Number-->
                    <button type="submit" form="sms-form" value="Submit" class="enc-button">Send key</button>
                
                </form>
            </div>
        </div>

        <p><br><br>Or if you would like to <b>Decrypt</b> a message sent to you, press the Decrypt button.</p>

        <!--Block for decryption elements-->
        <div id="form-container">
            <form id="dec-form" class="enc-form" action="/Files/decrypt.php" method="post">

                <!--Text area for collection of user inputted message-->
                <textarea id="enc-textbox" type="text" name="message" placeholder="Paste cipher text here for decryption..."><?php 
                   echo trim($_SESSION['decrypt']);
                ?></textarea>
                
                <!--Text area for collection of generated encryption key-->
                <div id="key-box">
                    <label for="key" id="key-text">Enter Generated Key: </label>
                    <input type="text" id="key-pwd" name="key"></input>
                </div>

            </form>

            <!--Decryption button-->
            <div class="enc-btns">

                <!--Decryption button-->
                <button type="submit" form="dec-form" value="Submit" class="enc-button">Decrypt</button>
        
            </div>
            
            <!--HTML/PHP block for after decrypting-->
            <p class="finished-output"><?php
                    //If done decrypting.
                    if(isset($_SESSION['decrypt'])) {
                        echo "The message was decrypted successfully.";
                    }
                ?>
            </p>
        </div>
         
    </main>
    <footer>
        <p class="footer-txt">Copyright © 2024. All rights reserved.</p>
    </footer>
</body>
</html>