<?php
namespace Encryption\Repositories\InterfaceRepositories;
/**
* EncryptionRepository interface
*/
interface EncryptionInterfaceRepository {
	
	//function to encypt
	public function encrypt($text);

	//function to decrypt
	public function decrypt($text);

}