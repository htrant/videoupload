<?php 

/***** HASH KEYS ******/
//The site's hashkey, do not change because it is used for password
//This is for DB password only
define('HASH_PASSWORD_KEY', 'iAMaHORSEwhoCANflyANairbusA330');
//This is for file name
define('HASH_FILENAME_KEY', 'iAMaHASHkeyFORfileUPLOAD');


/***** DATABASE ******/
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','videodemo');
define('DB_USER','willythekid');
define('DB_PASS','hihi1308');


/***** PATHS ******/
//Always add / after a path
define('URL', 'http://localhost/videodemo/');
define('URL_SERVER', 'http://www.videodemo.imhieu.com/');
define('FILEURL', URL_SERVER.'videofiles/');
define('LIB', 'lib/');


/***** FTP ******/
define('FTP_SERVER','ftp.imhieu.com');
define('FTP_USER','videodemo');
define('FTP_PASSWORD','Hihi1308@8');


?>