<?php
include 'algorithm.php';

session_start();

//Code to check for user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Capture the message that has been entered by the user
    $message = htmlspecialchars($_POST['message']);

    //Code to collect data for decryption
    $myData = $message;

    //Check if key has been set
    if (isset($_SESSION['key'])) {
        $key = $_SESSION['key'];
    } else {
        $key = $_POST['key'];
    }

    //Decryption block, ensuring that message can't be double decrypted in the same session.
    if (isset($myData) && isset($key)){
        
        //Capture the key that has been used
        $_SESSION['key'] = $key;

        //Decrypt the message that has been encrypted
        $_SESSION['decrypt'] = decrypt($myData, $method, $key);

        //Change the boolean value to null
        //$_SESSION['done'] = null;

    } else {
        echo "Decryption failed! Missing credentials.<br>";
    }

    echo "The new, decrypted message is: " . $decrypt;
    echo "The key used is: " . $key;

    //Return to the main page
    header("Location: ../Files/home.php");
}