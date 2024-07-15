<?php
    
    function encrypt($myData, $method, $key, $iv){
        $stored_iv = $iv;
        $encrypted_message = openssl_encrypt($myData, $method, $key, $options=0, $iv,);

        // Check for encryption errors
        if ($encrypted_message === false) {
        die('Encryption failed: ' . openssl_error_string());
        }

        // Encode the encrypted message (base64 is common for transmission/storage)
        $encoded_message = base64_encode($encrypted_message);

        // Display the original message and the encoded encrypted message
        echo "Original Message: " . $myData . PHP_EOL;
        echo "Encoded Encrypted Message: " . $encoded_message . PHP_EOL;

        //return some things to be used in the decryption one
        return $encoded_message;
    }

    function decrypt($encoded_message, $method, $key, $iv){
        
        //Encoded message
        if($encoded_message == null){
            $encoded_message = encrypt($myData, $method, $key, $iv);
        }
        
        //Decrypt the data    
        $decrypted_data = openssl_decrypt($encoded_message, $method, $key, $options=0, $iv);

        // Check for decryption success
        if ($decrypted_data === false) {
            echo "Decryption failed!";
        } else {
            echo "Decrypted data: " . $decrypted_data . PHP_EOL;
        }
    }
    
    decrypt($encoded_message, $method, $key, $iv);
?>
