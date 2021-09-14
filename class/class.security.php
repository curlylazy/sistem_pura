<?php 

class Security
{
	public function __construct()
	{
		$this->seckey = '2938123jkd(&*^#@20321jdasYWTTW11';
	}

	// filter
	public function FilterString($str)
	{
		return filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	}

	public function FilterInt($str)
	{
		return filter_var($str, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	}

	private function safe_b64encode($string) 
	{
		$data = base64_encode($string);
		$data = str_replace(array('+','/','='),array('-','_',''),$data);
		return $data;
	}
 
	private function safe_b64decode($string) 
	{
		$data = str_replace(array('-','_'),array('+','/'),$string);
		$mod4 = strlen($data) % 4;
		if ($mod4) {
			$data .= substr('====', $mod4);
		}
		return base64_decode($data);
	}
		
		
	function encrypt($text)
	{
		$key = $this->seckey;  
		$IV = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_RAND); 
		
		$enc = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_CBC, $IV)."-[--IV-[-".$IV;
		
		$res = $this->safe_b64encode($enc);

		return $res;
	}

	function decrypt($text)
	{
		$key = $this->seckey;   
		//$text = base64_decode($text); 
					
		$text = $this->safe_b64decode($text); 

		$IV = substr($text, strrpos($text, "-[--IV-[-") + 9);
		$text = str_replace("-[--IV-[-".$IV, "", $text);
		
		$result = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_CBC, $IV);

		return rtrim($result, "\x00..\x1F");
	}	
}

?>