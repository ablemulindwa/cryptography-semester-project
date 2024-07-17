<?php
//Test data
$myData = " ";

//Encryption method (AES-256 in CBC mode)
$method = 'AES-256-CBC';

// Encryption key (replace with a strong and secure key)
$key = " ";

//Create a secure key function
function createKey(){
    $key = openssl_random_pseudo_bytes(32);
    return $key;
}

// Encryption function
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
    //echo "\nOriginal Message: " . $myData . PHP_EOL;
    //echo "\nEncoded Encrypted Message: " . $encoded_message . PHP_EOL;

    //return some things to be used in the decryption one
    return $encoded_message;
}

// Decryption function
function decrypt($encoded_message, $method, $key){
    //Decode the data
    $decoded_message = base64_decode($encoded_message);

    //Decrypt the data    
    $decrypted_data = openssl_decrypt($decoded_message, $method, $key, $options=0);

    // Check for decryption success
    if ($decrypted_data === false) {
        echo "\nDecryption failed!";
    } else {
        echo "\nDecrypted data: " . $decrypted_data . PHP_EOL;
    }

    return $decrypted_data;
}

//echo "\nOriginal Message: " . $myData . PHP_EOL;

//Test statement 1
//$encoded_message = encrypt($myData, $method, $key);

//echo "\nEncoded Encrypted Message: " . $encoded_message . PHP_EOL;

//Test statement 2
//$decrypted_data = decrypt($encoded_message, $method, $key);

//echo "\nDecrypted Message: " . $decrypted_data . PHP_EOL;