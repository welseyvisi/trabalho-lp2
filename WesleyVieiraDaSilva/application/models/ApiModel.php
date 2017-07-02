<?php

include_once APPPATH.'libraries/API.php';
include_once APPPATH.'libraries/Cards.php';
include_once APPPATH.'libraries/Base.php';
include_once APPPATH.'libraries/Modal.php';


class ApiModel extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	/**
	 * fornece o link para o usuario fazer login
	 * @return string
	 */
	function getDataLogin(){
		
		$id = '28f001bf8d72428690c22c5cca1c4f93';
		$redirect = 'http://localhost/at02/WesleyVieiraDaSilva/index.php/inicio/resposta';
		$link = 'https://api.instagram.com/oauth/authorize/?client_id='.$id.'&redirect_uri='.$redirect.'&response_type=code&scope=public_content';
		
		$data['link'] = $link;
		$data['img']  = base_url('mdb/img/api.png');
		
		return $data;
	}
	
	
	/**
	 * recebe a resposta do instagram e usa para conseguir o token de acesso
	 * @param unknown $code
	 * @return string
	 */
	function getTokenEDados($code){
		//se não ouver codigo é redirecionado para fora
		if($code != ''){
			
			$api = new API();
			
			//pega o codigo e devolve os dados do usuario
			$dados = $api->getDadosIniciais($code);
			
			$data['token'] = $dados->access_token ;
			$data['userid'] = $dados->user->id;
			$data['userimg'] = $dados->user->profile_picture;
			$data['usernome'] = $dados->user->username;
			

			$base = new Base();
			$insere['data'] = date("Y-m-d");
			$insere['user'] = $dados->user->username;
			$insere['userid'] = $dados->user->id;
			$base->write($insere);

			session_start();
			$_SESSION['dados'] = $data;
			
			return base_url('index.php/inicio/resultado');
			
		}else{
			
			return base_url('index.php/inicio/logout');
		}
	}
	
	
	/**
	 * recebe o id do usuario e retorna um modal com as entradas dele no site
	 * @param unknown $id
	 * @return string
	 */
	function getEntradas($id){
		$base = new Base();
		$lista = $base->getAll();
		$text = '';
		foreach ($lista as $item){
			if($item->userId = $id){
				$text .= 'Usuario: '.$item->user.' - Data: '.$item->data.'<br>';
			}
		}
		
		$modal = new Modal('Historico de entradas', 'Historico de entradas', $text, '');
		
		$data['html'] = $modal->html();
		$data['script'] = $modal->getScript();
		$data['style'] = $modal->getStyle();
		return $data;
		
	}
	
	/**
	 * recebe o token de acesso e retorna cards com as fotos do usuario
	 * @param unknown $token
	 * @return string
	 */
	function getFotos($token){
	
		$api = new API();
		
		//retorna a lista
		$lista = $api->getListaFotos($token);

		//cria os cards
		$cards = new Cards($lista);
		$html = $cards->getCards();
		
		
		return $html;
	}
	
	
	/**
	 * cria um botão para o usuario poder sair
	 * @return string
	 */
	function getBtnSair(){
		$html = '<a href="'. base_url("index.php/inicio/logout") .'" class="btn btn-danger btn-lg active col-md-4" role="button">SAIR</a>';
		return $html;
	}
	
}















