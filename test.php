<?php
//Test data
$myData = "This is my message to encrypt, there shall not be anyone decrypting this message except for the right decrypter.";

//Encryption method (AES-256 in CBC mode)
$method = 'AES-256-CBC';

// Encryption key (replace with a strong and secure key)
$key = openssl_random_pseudo_bytes(32);

function encrypt($myData, $method, $key){
    //Open ssl encryption function
    $encrypted_message = openssl_encrypt($myData, $method, $key, $options=0);

    // Check for encryption errors
    if ($encrypted_message === false) {
    die('Encryption failed: ' . openssl_error_string());
    }

    // Encode the encrypted message
    $encoded_message = base64_encode($encrypted_message);

    // Display the original message and the encoded encrypted message
    echo "\nOriginal Message: " . $myData . PHP_EOL;
    echo "\nEncoded Encrypted Message: " . $encoded_message . PHP_EOL;

    //return some things to be used in the decryption one
    //return $encoded_message;
}

encrypt($myData, $method, $key);