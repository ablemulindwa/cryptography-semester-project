<?php
include 'algorithm.php';

session_start();

//Code to check for user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$message = htmlspecialchars($_POST['message']);
    $message = "cDVCUXNadWNJUlQ0VTlleVNWYW9JZz09";

    //Code to generate inputs for encryption
    $myData = $message;
    $key = createKey(); 

    //Encryption block, ensuring that message 
    //can't be double encrypted in the same session.
    if ($_SESSION['done'] == true){
        
        //Capture the key that has been used
        $_SESSION['key'] = $key;     
        
        //Capture the message that has been encrypted
        //$_SESSION['message'] = decrypt($myData, $method, $key);

        //Decrypt the message that has been encrypted
        $message = decrypt($myData, $method, $key);

        //Change the boolean value to null
        $_SESSION['done'] = null;

    } else {
        echo "Decryption failed! Missing credentials.<br>";
    }

    echo "The new, decrypted message is: " . $message;
    echo "The key used is: " . $key;

    //Tests for the output
    //echo "The new, decrypted message is: " . $_SESSION['message']."<br>";
    //echo "The key used is: " . $_SESSION['key'];

    //header("Location: ../Files/home.php");
}