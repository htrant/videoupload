<?php

class Upload_Model extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function doUpload($data) {
		$noError = true;
		$msg = "";
		
		/**
		 * Rename file before uploading to server
		 * Hash name of file
		 */
		//split file name to name and extension
		$localfilepath = pathinfo($data['file']['name']);
		$name = $localfilepath['filename'];
		$ext = $localfilepath['extension'];
		
		//change name of the file
		$renamed = Hash::create('md5', $name.uniqid(rand(),true) , HASH_FILENAME_KEY);
		$file_on_server = $renamed. '.' .$ext;		
		
		
		/**
		 * Upload file to server using FTP
		 * - Set filepath on server
		 * - FTP connection
		 * - Login
		 * - Upload
		 */				
		$remote_file = "/" . $file_on_server;	//filepath on server				
		$conn = ftp_connect(FTP_SERVER) or die("Server connection failed!"); //server connection
		
		//login
		if (@ftp_login($conn, FTP_USER, FTP_PASSWORD) == false) {
			$msg .=  "Server login failed!";
			$noError = false;			
		}
		
		ftp_pasv($conn, true);
		
		if (ftp_put($conn, $remote_file, $data['file']['tmp_name'], FTP_BINARY) == false ) //upload file
		{
			$msg .= "Server error - Cannot upload file!";
			$noError = false;
		}
		
		ftp_close($conn); //close connection
		
		
		/**
		 * Store file info for user
		 */
		if ($noError == true ) {
			$this->db->insert('video', array(
					'userid'		=> Session::get('userid'),
					'file_title'	=> $data['filetitle'],
					'file_des'		=> $data['filedes'],
					'file_on_server'=> $file_on_server,
					'date_added' => date('Y-m-d H:i:s')
			));
		}
		return $noError;
	} 
	
}

?>