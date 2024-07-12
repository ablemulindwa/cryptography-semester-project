<?php

//The logic for the backend encryption/decryption algorithm

//Test data
$myData = "This is my message to encrypt, there shall not be anyone decrypting this message except for the right decrypter.";

//Encryption method (AES-256 in CBC mode)
$method = 'AES-256-CBC';

// Encryption key (replace with a strong and secure key)
$key = 'your_encryption_key_here'; // Replace with a long, random key (32 bytes for AES-256)

// Initialization vector (replace with a random IV for each encryption)
$iv = openssl_random_pseudo_bytes(16); // 16 bytes for AES-256 in CBC mode

openssl_encrypt($myData, $method, $key, , $iv,);

// Check for encryption errors
if ($encrypted_message === false) {
  die('Encryption failed: ' . openssl_error_string());
}

// Encode the encrypted message (base64 is common for transmission/storage)
$encoded_message = base64_encode($encrypted_message);

// Display the original message and the encoded encrypted message
echo "Original Message: " . $message . PHP_EOL;
echo "Encoded Encrypted Message: " . $encoded_message . PHP_EOL;

?>
