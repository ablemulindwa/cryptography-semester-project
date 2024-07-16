<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Encryption Tool</title>
</head>
<body>
    <!--Heading/Instruction-->
    <h1>Welcome to the Encrypted Communications company!</h1>
    
    <!-- Encryption Message Box-->    
    <form action="home.php" method="post">
        <div class="container">
            <input type="text" name="message"><br>
            <button id="encryptButton">Encrypt</button>
        </div>
    </form>
    
    <!-- Decryption Message Box -->
    <form action="home.php" method="get">
        <div class="container">
            <textarea id="message" rows="5"></textarea>
            <button id="decryptButton">Decrypt</button>
        </div>
    </form>
    
    <!-- Implementation of The Algorithm-->
    <?php
        include 'algorithm.php';

    ?>
</body>
</html>