<?php
class SMSreguler {
	protected $to;
	protected $text;
	protected $username;
	protected $password;
	//protected $idreport;
	protected $apikey;

	public function setTo($to) {
		$this->to = $to;
	}

	public function setText($text) {
		$this->text = $text;
	}

	public function setUsername($user) {
		$this->username = $user;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function setApi($apikey) {
		$this->apikey = $apikey;
	}

	public function smssend() {
		if (!$this->to) {
			trigger_error('Error: Phone to required!');
			exit();			
		}

		if (!$this->text)  {
			trigger_error('Error: Text Message required!');
			exit();					
		}
		$curlHandle = curl_init();
		$url="http://162.211.84.203/sms/smsreguler.php?username=".$this->username."&password=".$this->password."&key=".$this->apikey."&number=".$this->to."&message=".urlencode($this->text);
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;
	}
	public function smssaldo() {	
		$curlHandle = curl_init();
		$url="http://162.211.84.203/sms/smssaldo.php?username=".$this->username."&password=".$this->password."&key=".$this->apikey;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;		
	}	
	public function smsreport() {	
		$curlHandle = curl_init();
		$url="http://162.211.84.203/sms/smsregulerreport.php?id=".$this->idreport."&key=".$this->apikey;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;		
	}			
}
?>