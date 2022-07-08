<?php 
/**
 * Undocumented function
 *
 * @return boolean
 * This functions here are User define method against APIs
 */

	function redirect($url=''){
		if(!empty($url))
		echo '<script>location.href="'.ROOT.$url.'"</script>';
	}
	function getRequestMethod(){
		return strtoupper($_SERVER['REQUEST_METHOD']);
	}
	function isGet(){
		return $this->getRequestMethod() === 'GET';
	}
	function isPost(){
		return $this->getRequestMethod() === 'POST';
	}
	function isPut(){
		return $this->getRequestMethod() === 'PUT';
	}
	function isDelete(){
		return $this->getRequestMethod() === 'DELETE';
	}
	function isPatch(){
		return $this->getRequestMethod() === 'PATCH';
	}
	function isSetSessionAuthentication(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'ON') {
			$link = "https"; 
		}else{
			$link = "http"; 
			$link .= "://"; 
			$link .= $_SERVER['HTTP_HOST']; 
			$link .= $_SERVER['REQUEST_URI'];
			// 
			$Authsess = '5dJQ3Ut3ka2dPwqQlse8jOIPAms1We014okj09175gBDcrYbc0d0';
			$_SESSION['userdata'] = $Authsess;
			if(!isset($_SESSION['userdata']) && !strpos($link, ROOT)){
				redirect(ROOT);
			}
			if(isset($_SESSION['userdata']) && strpos($link, ROOT)){
				redirect(ROOT);
			}
		}
	}

	function crypto_rand_secure($min, $max){
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}
function getToken($length){
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $tokenCore .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }
    return $tokenCore;
}