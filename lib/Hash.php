<?php

class Hash {
		
	/**
	  * @param string $algo The alogrithm (eg. md5, sha1).
	  * @param string $data The data to be hashed.
	  * @param string $salt (Should be remain the same in the system).
	  * @return string The hashed/salted data.
	*/		
	public static function create($algo, $data, $salt) {
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);
		return hash_final($context);
	}
	
}

?>
