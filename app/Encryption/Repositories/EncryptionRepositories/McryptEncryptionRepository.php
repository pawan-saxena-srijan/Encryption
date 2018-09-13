<?php
//@namespace[Encryption\Repositories\EncryptionRepositories]
namespace Encryption\Repositories\EncryptionRepositories;

//Use the encryption interface from another namespace
use Encryption\Repositories\InterfaceRepositories\EncryptionInterfaceRepository as EncryptionInterfaceRepository;

define('IV_SIZE', mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
/**
* McryptEncryptionRepository client implements @EncryptionInterfaceRepository
*/
class McryptEncryptionRepository implements EncryptionInterfaceRepository
{
	//Define class member variables
	private $key;
	private $iv;

	//Initializa some values in constructor
	function __construct() {
		$this->key = 'Encryptionassignment';
		$this->iv = mcrypt_create_iv(IV_SIZE, MCRYPT_DEV_URANDOM);;
	}

	/*
	*@encrypt
	*@params[text]
	* return encrypted string
	*/
	public function encrypt($text)
	{
		$crypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key, $text, MCRYPT_MODE_CBC, $this->iv);
		$combo = $this->iv . $crypt;
		$payload = base64_encode($this->iv . $crypt);
		return $payload;
	}

	/*
	*@decrypt
	*@params[encrypted string]
	* return decrypted string
	*/
	public function decrypt($text)
	{
		$combo = base64_decode($text);
		$this->iv = substr($combo, 0, IV_SIZE);
		$crypt = substr($combo, IV_SIZE, strlen($combo));
		$payload = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, $crypt, MCRYPT_MODE_CBC, $this->iv);
		return $payload;
	}
}