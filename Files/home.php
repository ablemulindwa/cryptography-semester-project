<?php
    echo "Enter Your Message Here";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Encryption Tool</title>
</head>
<body>
    <!--Heading/Instruction-->
    <h1>Encrypt Your Message</h1>
    
    <!-- Encryption Message Box-->    
    <form action="home.php" method="get">
        <div class="container">
            <input type="text" name="message">
            <button id="encryptButton">Encrypt</button>
            <p id="encryptedMessage"></p>
            <?php echo $_GET["message"] ?>
        </div>

    </form>

        <!-- Phone number Box -->
        <div class="container">
            <textarea id="message" rows="5"></textarea>
            <button id="encryptButton">Encrypt</button>
            <p id="encryptedMessage"></p>
        </div>
    

    <!-- Implementation of The Algorithm-->
</body>
</html>