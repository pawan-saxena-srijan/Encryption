<?php
namespace Encryption\Repositories\EncryptionRepositories;

//Use the encryption interface from another namespace
use Encryption\Repositories\InterfaceRepositories\EncryptionInterfaceRepository as EncryptionInterfaceRepository;

/**
* OpensslEncryptionRepository client implements @EncryptionInterfaceRepository
*/
class OpensslEncryptionRepository implements EncryptionInterfaceRepository
{
	//Define class member variables
	private $key;
	private $iv;
	private $encrypt_method;

	//Initializa some values in constructor
	function __construct() {		
		$this->key = hash('sha256', 'Encryption');
		$this->iv = substr(hash('sha256', 'Encryptioniv'), 0, 16);
		$this->encrypt_method = 'AES-256-CBC';
	}

	/*
	*@encrypt
	*@params[text]
	* return encrypted string
	*/
	public function encrypt($text)
	{
		return $output = base64_encode(openssl_encrypt($text, $this->encrypt_method, $this->key, 0, $this->iv));		
	}

	/*
	*@decrypt
	*@params[encrypted string]
	* return decrypted string
	*/
	public function decrypt($text)
	{
		return $output = openssl_decrypt(base64_decode($text), $this->encrypt_method, $this->key, 0, $this->iv);
	}
}