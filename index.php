<?php
require_once __DIR__ . '/app/bootstrap.php';

//Using Encryption FactoryClient traits
use Encryption\Factories\EncryptionClientFactory as EncryptionClientFactory;
use Encryption\Factories\EncryptionClientFactory2 as EncryptionClientFactory2;

//use traits for different encryption clients
use Encryption\Repositories\EncryptionRepositories\McryptEncryptionRepository as McryptEncryptionRepository;
use Encryption\Repositories\EncryptionRepositories\OpensslEncryptionRepository as OpensslEncryptionRepository;

//SECOND APPROACH
$encryptionFactory2 = EncryptionClientFactory2::create('openssl');
$encyptedtext2 = $encryptionFactory2->encrypt('abc');
print_r('encrypted text from openssl : ' . $encyptedtext2 . '<br>');
print_r('decrypted text from openssl : ' . $encryptionFactory2->decrypt($encyptedtext2) . '<br><br>');

//FIRST APPROACH
//USE TYPE AT TIME OF OBJECT CREATIO
$encryptionFactory1 = new EncryptionClientFactory(new McryptEncryptionRepository());
$encyptedtext1 = $encryptionFactory1->encryptionObject->encrypt('abc');
print_r('encrypted text from mcrypt : ' . $encyptedtext1 . '<br>');
print_r('decrypted text from mcrypt : ' . $encryptionFactory1->encryptionObject->decrypt($encyptedtext1) . '<br><br><br><br>');