<?php

/**
 * class que complementa Api
 * @author Wesley Vieira
 *
 */
class API{
	function __construct(){

	}

	/**
	 * pega o codigo recebido faz solicitação do resto dos dados para o instagram e retorna os dados
	 * @param unknown $code
	 * @return mixed
	 */
	public function getDadosIniciais($code){
		$parametros = array('client_id' => '28f001bf8d72428690c22c5cca1c4f93', 'client_secret' => '39dad71683c54f508ad0738757d03140', 'grant_type' => 'authorization_code', 'redirect_uri' => 'http://localhost/at02/WesleyVieiraDaSilva/index.php/inicio/resposta', 'code' => $code);
			
		$curl = curl_init('https://api.instagram.com/oauth/access_token');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $parametros);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			
		$result = curl_exec($curl);
		curl_close($curl);
			
		$finalResult = json_decode($result);
		

		return $finalResult;
	}
	
	
	/**
	 * a partir do token de acesso solicita a lista de  links das fotos do usuario para o instagram
	 * @param unknown $token
	 * @return unknown
	 */
	public function getListaFotos($token){
		$url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token='.$token;
		
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		
		$result = curl_exec($curl);
		
		
		curl_close($curl);
		
		$finalResult = json_decode($result);
	
	
		return $finalResult->data;
	}
}