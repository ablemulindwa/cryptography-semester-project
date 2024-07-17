<?php
include 'algorithm.php';

session_start();

//Code to check for user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = htmlspecialchars($_POST['message']);
    
    //Code to generate inputs for encryption
    $myData = $message;
    $key = createKey(); 

    //Encryption block, ensuring that message 
    //can't be double encrypted in the same session.
    if ($_SESSION['message'] == Null){
        
        //Capture the key that has been used
        $_SESSION['key'] = $key;
        
        //Capture the message that has been encrypted
        $_SESSION['message'] = encrypt($myData, $method, $key);
        echo "Message Encrypted successfully!<br>";
    } else {
        echo "Encryption failed! Can't encrypt a message more than once.<br>";
    }

    echo "The new, encrypted message is: " . $_SESSION['message']."<br>";
    echo "The generated key is: " . $_SESSION['key'];
    
    //header("Location: ../Files/home.php");
}