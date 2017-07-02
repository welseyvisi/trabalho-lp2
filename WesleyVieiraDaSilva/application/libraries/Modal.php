<?php
/** 
 * Gera o Modal Boxes
 * @author Wesley Vieira
 *
 */
class Modal{
	protected $text;
	protected $btn;
	protected $title;
	protected $footer;
	/**
	 * Construtor que configura textos b�sicos ao criar o objeto
	 * @param unknown $btn contem o que ser� escrito no bot�o do modal
	 * @param unknown $title contem o titulo do modal
	 * @param unknown $text contem o texto do modal
	 * @param unknown $footer contem o que ser� escrito no footer do modal
	 */
	function __construct($btn,$title,$text,$footer){
		$this->text = $text;
		$this->btn = $btn;
		$this->title = $title;
		$this->footer = $footer;

	}


	/**
	 * Retorna o head do modal com o titulo escolhido
	 * @return string HTML do head
	 */
	protected function getHeader(){
		$html = '<div class="wmodal-header">
			      <span class="close">&times;</span>
			      <h2>'.$this->title.'</h2>
			    </div>';
		
		return $html;
	}
	
	/**
	 * Retorna o footer do modal com o seu texto escolhido
	 * @return string HTML do footer
	 */
	protected function getfooter(){
		$html = '<div class="wmodal-footer">
			      <h3>'.$this->footer.'</h3>
			    </div>';
		
		return $html;
	}

	/**
	 * Retorna o bot�o do modal com o seu texto escolhido
	 * @return string HTML do head
	 */
	protected function getButton(){
		return '<button id="myBtn" class="w3-btn w3-green w3-large w3-padding">'.$this->btn.'</button>';
	}
	
	/**
	 * retorna o estilo de pagina do modal
	 * @return string HTML com o Style
	 */
	public function getStyle(){
		$style = '<style>
					/* The Modal (background) */
					.wmodal {
					    display: none; /* Hidden by default */
					    position: fixed; /* Stay in place */
					    z-index: 1; /* Sit on top */
					    padding-top: 100px; /* Location of the box */
					    left: 0;
					    top: 0;
					    width: 100%; /* Full width */
					    height: 100%; /* Full height */
					    overflow: auto; /* Enable scroll if needed */
					    background-color: rgb(0,0,0); /* Fallback color */
					    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
					}
					
					/* Modal Content */
					.wmodal-content {
					    position: relative;
					    background-color: #fefefe;
					    margin: auto;
					    padding: 0;
					    border: 1px solid #888;
					    width: 80%;
					    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
					    -webkit-animation-name: animatetop;
					    -webkit-animation-duration: 0.4s;
					    animation-name: animatetop;
					    animation-duration: 0.4s
					}
					
					/* Add Animation */
					@-webkit-keyframes animatetop {
					    from {top:-300px; opacity:0} 
					    to {top:0; opacity:1}
					}
					
					@keyframes animatetop {
					    from {top:-300px; opacity:0}
					    to {top:0; opacity:1}
					}
					
					/* The Close Button */
					.close {
					    color: white;
					    float: right;
					    font-size: 28px;
					    font-weight: bold;
					}
					
					.close:hover,
					.close:focus {
					    color: #000;
					    text-decoration: none;
					    cursor: pointer;
					}
					
					.wmodal-header {
					    padding: 2px 16px;
					    background-color: #5cb85c;
					    color: white;
					}
					
					.wmodal-body {padding: 2px 16px;}
					
					.wmodal-footer {
					    padding: 2px 16px;
					    background-color: #5cb85c;
					    color: white;
					}
					</style>';
		return $style;
	}

	/**
	 * retorna o script de pagina do modal
	 * @return string HTML com o Script
	 */
	public function getScript(){
		$script = '<script>
					var modal = document.getElementById("myModal");
					var btn = document.getElementById("myBtn");
					var span = document.getElementsByClassName("close")[0];
					btn.onclick = function() {
						modal.style.display = "block";
					}
					span.onclick = function() {
						modal.style.display = "none";
					}
					window.onclick = function(event) {
						if (event.target == modal) {
							modal.style.display = "none";
						}
					}
					</script>';
		return $script;
	}
	
	/**
	 * Retorna o corpo do modal com o seu texto escolhido
	 * @return string HTML do body
	 */
	protected function getBlock(){
		$html = '<div class="wmodal-body">
			      <p>'.$this->text.'</p>
			    </div>';

		return $html;
	}
	
	/**
	 * Utiliza as fun��es para juntar todas as partes do modal boxes e retorna um modal pronto mas sem o estilo e script
	 * @return string HTML com o modal completo
	 */
	public function html(){
		$html = $this->getButton();
		$html .= '<div id="myModal" class="wmodal">';
		$html .= '<div class="wmodal-content">';
		$html .= $this->getHeader();
		$html .= $this->getBlock();
		$html .= $this->getfooter();
		$html .= '</div>';
		$html .='</div>';

		return $html;

	}


}