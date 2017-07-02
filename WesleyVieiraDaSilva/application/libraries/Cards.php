<?php
class Cards{
	private $lista;
	
	function __construct($lista){
		$this->lista = $lista;
	}
	
	
	function getInfos($img){
		
		$string = '<center>| - <font color="#ff0000">&#10084;</font> Likes: '.$img->likes->count.' - | | - <font color="#0000ff"> &#9993;</font> Comentarios: '.$img->comments->count.' - |</center>' ;
		
		return $string;
	} 
	
	
	function getImg($img){
		$string = '<!--Card image-->
						<a href="'. $img->link .'"><img class="img-fluid" src="'.$img->images->standard_resolution->url.'" alt=""></a>
					<!--/.Card image-->' ;
		
		return $string;
	}
	
	
	function getBlock($img){
		$string = '<!--Card content-->
						 <div class="card-block">
						 <!--Text-->
						 <p class="card-text">'.$this->getInfos($img).'</p>
						 <div align="center"><a download="" href="'. $img->images->standard_resolution->url .'" class="btn btn-primary">Download</a></div>      
					</div>
					<!--/.Card content-->' ;
		
		return $string;
	}
	

	function getCards(){

		$html = '<div class="container" >';
		foreach($this->lista as $img){
			$html .= '
					<div class="container" style="max-width: 360px; border: solid 0px #000; float:left; margin-top:25px;margin-bottom:25px;">
						<div class="card" width=" 100px">
						
						    '.$this->getImg($img).
						    $this->getBlock($img).'
						</div>
					</div>';
		}
		$html .= '<div style="clear: both;"></div></div><br><br>';
		
		
		
		return $html;
	}
}