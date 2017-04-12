<?php 
class valida { 
	//verifica se o numero de caracteres está entre um intervalo
	public function isOnTheGap($min, $max, $str){ 
		$ok = false;
		if(strlen($str) >= $min && strlen($str) < $max){
			$ok = true;
		}
		return $ok;
	} 
	
	//verifica se os caracteres são numeros
	public function isNum($num){ 
		$num = str_replace(" ","",$num);
		 if (!is_numeric($num)) {
			return false;
		}else{
			return true;
		}
	} 
	
	//verifica se a string é um e-mail
	public function isEmail($str){
		$conta = "^[a-zA-Z0-9\._-]+@";
		$domino = "[a-zA-Z0-9\._-]+.";
		$extensao = "([a-zA-Z]{2,4})$";
		$pattern = "/".$conta.$domino.$extensao."/";
		if (preg_match($pattern, $str)){
			return true;
		}else{
			return false;	
		}
	}
	
	//verifica se uma string não contem caracteres especiais ou numeros
	public function isString($str){
		$str = str_replace(" ","",$str);
		$ok = true;
		$c = str_split($str);
		//if ( empty( $str) || !preg_match( '/^[\w\n\s]+$/i' , $str ) ){
                if ( empty( $str) || preg_match( "/[][><}{)(:;,!?*%~^`&#@]/" , $str ) ){
			$ok = false;
		}else{
			for ( $i = 0; $i < strlen($str); $i++ ){
				if(is_numeric($c[$i])){
					$ok = false;
				}
			}
		}
		return $ok;
	}
} 
?>

