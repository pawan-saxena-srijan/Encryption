<?php
//SECOND APPROACH

//@namespace[Encryption\Factories]
namespace Encryption\Factories;

use Encryption\Repositories\InterfaceRepositories\EncryptionFactoryInterfaceRepository as EncryptionFactoryInterfaceRepository;
use Encryption\Repositories\InterfaceRepositories\EncryptionInterfaceRepository as EncryptionInterfaceRepository;

//use traits for different encryption clients
use Encryption\Repositories\EncryptionRepositories\McryptEncryptionRepository as McryptEncryptionRepository;
use Encryption\Repositories\EncryptionRepositories\OpensslEncryptionRepository as OpensslEncryptionRepository;
/**
* EncryptionClientFactory to provide required encryption client at runtime.
*/
class EncryptionClientFactory2 implements EncryptionFactoryInterfaceRepository
{
	/*
	*@params[type]
	*takes encryption client type as method param
	*
	*returns[EncryptionClient @param]
	*/
	public static function create($type = 'openssl'){
		switch ($type) {
			case 'openssl':
				return new OpensslEncryptionRepository();
				break;
			case 'mcrypt':
				return new McryptEncryptionRepository();
				break;
			default:
				return new OpensslEncryptionRepository();
				break;
		}
	}

	//Method to destroy object explicitly
	public function destroy(){
		unset($this->encryptionObject);
	}
}