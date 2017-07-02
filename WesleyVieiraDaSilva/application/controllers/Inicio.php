<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Controlador padrão para as paginas
 * @author Wesley Vieira
 *
 */
class Inicio extends CI_Controller {
	/**
	 * Recebe todo o conteúdo HTML e textual, concatena com um head,
	 * uma barra de navegação e um footer e exibe tudo na tela
	 * 
	 * @param textHTML $content conteúdo HTML ou textual a ser exibido na pagina
	 */

	private function show($content,$estilo,$script,$titulo) {
		$data['titulo'] = $titulo;
		$data['style'] = $estilo;
		$data['script'] = $script;
		$html = $this->load->view('common/header', $data, true);
		$html .= $this->load->view('common/navbar', null, true);
	
		$html .= $content;
		
		$html .= $this->load->view('common/footer',$data, true);
		$html .= $this->load->view('common/basicfooter', null, true);
	
		echo $html;
	}
	
	/**
	 * Exibe a pagina inicial
	 */
	public function index(){
		
		$this->show($this->load->view('inicialview',null,true),'','','Pagina inicial');
	}
	
	
	
	


	/**
	 * Exibe informações sobre o trabalho
	 */
	public function sobre(){
		$this->show($this->load->view('sobreview',null,true),'','','Sobre o trabalho');
	}
	
	


	/**
	 * Exibe relatorio de interação
	 */
	public function relatorio(){
		$this->show($this->load->view('interacaoview',null,true),'','','Relatorio de interacao');
	}
	
	


	/**
	 * Exibe a pagina principal onde tem o botão para o usuario logar
	 */
	public function principal(){

		$this->load->model('ApiModel','model');
		$data = $this->model->getDataLogin();
		
		$html = $this->load->view('entraview',$data,true);
		
		$this->show($html,'','','API');
	}
	
	


	/**
	 * recebe a resposta do instagram e junta os dados usuario
	 */
	public function resposta(){
		$code = '';
		if(isset($_GET['code'])){
			$code = $_GET['code'];
		}
		
		$this->load->model('ApiModel','apimodel');
		$reurl = $this->apimodel->getTokenEDados($code);

		header('location:'.$reurl);
		
	}
	
	


	/**
	 * mostra todo o resultado para o usuario
	 */
	public function resultado(){
		session_start();
		if(!isset($_SESSION['dados'])){
			header('location:'.base_url('index.php/inicio/logout'));
		}

		$this->load->model('ApiModel','apimodel');
		$data['linkInsta'] = 'https://www.instagram.com/'.$_SESSION['dados']['usernome'];
		$data['nome'] = $_SESSION['dados']['usernome'];
		$data['foto'] = $_SESSION['dados']['userimg']; 
		$data['fotos'] = $this->apimodel->getFotos($_SESSION['dados']['token']);
		$modal = $this->apimodel->getEntradas($_SESSION['dados']['userid']);
		$data['modal'] = $modal['html'];
		
		$data['btnSair'] = $this->apimodel->getBtnSair();
		


		$html = $this->load->view('resultadoview',$data,true);
		
		$this->show($html,$modal['style'],$modal['script'],'Recuperador de Fotos');
		
	}
	
	


	/**
	 * faz logout do usuario
	 */
	public function logout(){
		session_start();
		unset($_SESSION['dados']);
		
		echo '<html><head><META HTTP-EQUIV="refresh" CONTENT="0; URL='.base_url('index.php/inicio/principal').'"></head><body><iframe style="display:none" src="https://instagram.com/accounts/logout"> </iframe></body>';
	}
	
	
	
}














