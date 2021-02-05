<?php

// The version number (9_5_0) should match version of the Chilkat extension used, omitting the micro-version number.
// For example, if using Chilkat v9.5.0.48, then include as shown here:
include("chilkat_9_5_0.php");

// This example assumes the Chilkat API to have been previously unlocked.
// See Global Unlock Sample for sample code.

$rsa = new CkRsa();

// This example also generates the public and private
// keys to be used in the RSA encryption.
// Normally, you would generate a key pair once,
// and distribute the public key to your partner.
// Anything encrypted with the public key can be
// decrypted with the private key.  The reverse is 
// also true: anything encrypted using the private
// key can be decrypted using the public key.

// Generate a 1024-bit key.  Chilkat RSA supports
// key sizes ranging from 512 bits to 4096 bits.
$success = $rsa->GenerateKey(1024);
if ($success != true) {
    print $rsa->lastErrorText() . "\n";
    exit;
}

// Keys are exported in XML format:
$publicKey = $rsa->exportPublicKey();
$privateKey = $rsa->exportPrivateKey();

$plainText = 'Encrypting and decrypting should be easy!';

// Start with a new RSA object to demonstrate that all we
// need are the keys previously exported:
$rsaEncryptor = new CkRsa();

// Encrypted output is always binary.  In this case, we want
// to encode the encrypted bytes in a printable string.
// Our choices are "hex", "base64", "url", "quoted-printable".
$rsaEncryptor->put_EncodingMode('hex');

// We'll encrypt with the public key and decrypt with the private
// key.  It's also possible to do the reverse.
$success = $rsaEncryptor->ImportPublicKey($publicKey);

$usePrivateKey = false;
$encryptedStr = $rsaEncryptor->encryptStringENC($plainText,$usePrivateKey);
print $encryptedStr . "\n";

// Now decrypt:
$rsaDecryptor = new CkRsa();

$rsaDecryptor->put_EncodingMode('hex');
$success = $rsaDecryptor->ImportPrivateKey($privateKey);

$usePrivateKey = true;
$decryptedStr = $rsaDecryptor->decryptStringENC($encryptedStr,$usePrivateKey);

print $decryptedStr . "\n";

?>
