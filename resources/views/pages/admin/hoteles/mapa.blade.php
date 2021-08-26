@extends('layouts.app')

@section('content')	
<link href="{{ asset('/css/estilos.css') }}" rel="stylesheet">
<body>
	<iframe width="100%" height="500px" style="border:0;" loading="lazy" allowfullscreen 
		src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD_k-rf-SKgI5ig21wRM_RyQsycJGu2AsM&q=Hotels,Ocosingo">
	</iframe>   
        
	<?php   
	error_reporting(0);
	ini_set('max_execution_time', 300); //5 minutes    
        		$respuesta = file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/json?query=hotels+in+Ocosingo&key=AIzaSyD_k-rf-SKgI5ig21wRM_RyQsycJGu2AsM");

                $json = json_decode($respuesta);

				$resultados = $json-> {"results"};
				$n=count($resultados);
		
	
				for ($i=0; $i<$n; $i++) {

                $nom_hotel = $json->{"results"}[$i]->{"name"};
                $desti = $json->{"results"}[$i]->{"formatted_address"};
                $rating = $json->{"results"}[$i]->{"rating"};
                $rating_users = $json->{"results"}[$i]->{"user_ratings_total"};
                $id = $json->{"results"}[$i]->{"place_id"};
			
				if($rating >= 3.5) {

					$respuesta1 = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?place_id=".$id."&key=AIzaSyD_k-rf-SKgI5ig21wRM_RyQsycJGu2AsM");
					$json1 = json_decode($respuesta1);
					$foto = $json1->{"result"}->{"photos"}[0]->{"photo_reference"};
					$telefono = $json1->{"result"}->{"formatted_phone_number"};
					$comentario = $json1->{"result"}->{"reviews"}[2]->{"text"};

        	?>
				<div class="card" style="border:5; background-color: #f0f3f4; display: inline-flex; margin-left: 2%; margin-top: 2%;">
				  	<div class="card-header" style="width: 400px; height: 530px;">
				    	<h4 class="card-title" style="text-align: center; text-transform: uppercase;"><b><?php echo $nom_hotel; ?></b></h4>
						<?php
							if($foto != null) {
							?>
								<img style="margin-left: 15%; width: 230px; height: 200px;" src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=250&photoreference=<?php echo $foto;?>&key=AIzaSyD_k-rf-SKgI5ig21wRM_RyQsycJGu2AsM">
							<?php
							}
							else{
							?>
								<img style="margin-left: 15%; width: 230px; height: 200px;" src="{{URL::asset('images/imagen.png')}}">
							<?php
							}
						?>
						<p class="card-text"><b>Direccion: </b><?php echo $desti; ?></p>
						<?php
							if($telefono != null) {
							?>
								<p class="card-text"><b>Telefono: </b><?php echo $telefono; ?></p>
							<?php
							}
							else{
							?>
								<p class="card-text"><b>Telefono: </b>Dato no disponible</p>
							<?php
							}
						?>
						<p class="card-text"><b>Rating: </b><?php echo $rating; ?></p>
					  	<p class="card-text"><b>Visitas: </b><?php echo $rating_users; ?></p>
						<?php
							if($comentario != null) {
							?>
								<p class="card-text spanish"><b>Comentario: </b><?php echo $comentario; ?></p>
							<?php
							}
							else{
							?>
								<p class="card-text"><b>Comentario: </b>Dato no disponible</p>
							<?php
							}
						?>
			    	</div>
		    	</div>
			 <?php
				}
			}
			 ?>
</body>
@endsection