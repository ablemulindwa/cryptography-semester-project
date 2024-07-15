<?php

//The logic for the backend encryption/decryption algorithm

    //Test data
    $myData = "This is my message to encrypt, there shall not be anyone decrypting this message except for the right decrypter.";

    //Encryption method (AES-256 in CBC mode)
    $method = 'AES-256-CBC';

    // Encryption key (replace with a strong and secure key)
    $key = openssl_random_pseudo_bytes(32);

    // Initialization vector (replace with a random IV for each encryption)
    $iv = var_export(openssl_random_pseudo_bytes(16));