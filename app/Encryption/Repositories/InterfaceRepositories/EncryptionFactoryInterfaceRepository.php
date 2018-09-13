<?php
namespace Encryption\Repositories\InterfaceRepositories;
/**
* Interface to create a encryption factory
*/
interface EncryptionFactoryInterfaceRepository
{
	//function to build factory object
	public static function create();

	//function to destroy factory object
	public function destroy();
}