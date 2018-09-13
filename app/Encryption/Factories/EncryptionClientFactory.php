<?php
//FIRST APPROACH
//@namespace[Encryption\Factories]
namespace Encryption\Factories;

use Encryption\Repositories\InterfaceRepositories\EncryptionFactoryInterfaceRepository as EncryptionFactoryInterfaceRepository;

use Encryption\Repositories\InterfaceRepositories\EncryptionInterfaceRepository as EncryptionInterfaceRepository;

/**
* EncryptionClientFactory to provide required encryption client at runtime.
*/
class EncryptionClientFactory implements EncryptionFactoryInterfaceRepository
{
	public $encryptionObject;

	function __construct(EncryptionInterfaceRepository $encryptionObject)
	{
		$this->encryptionObject = $encryptionObject;
	}

	public static function create(){}

	public function destroy(){
		unset($this->encryptionObject);
	}
}