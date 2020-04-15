@extends('layouts.app' ,
    [ 'metatitle' => $metatitle ?? 'Exiled Quests']
)

@section('content')
<body class="int fondo">
    
    <!-- # SLIDER -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner slider-carousel">
		  
		  <!-- # Slide1 -->
		  <div class="carousel-item active" style="background-image: url(images/slider1.png);">
			<div class="blackMask"></div>
			<div class="captionSlider">
				 <div class="container">
					  <div class="row d-flex align-items-center">
  						  <!-- slider__left -->
						  <div class="col-md-12 col-lg-26 col-xl-6 slider__left">
                            <h2>Exiled Quests</h2>
						  </div>
					  </div>
				 </div>
			  </div>
		  </div>
		  
		  <!-- # Slide2 -->
		  <div class="carousel-item" style="background-image: url(images/slider2.png);">
			<div class="captionSlider">
				 <div class="container">
					  <div class="row d-flex align-items-center">
  
						  <!-- slider__left -->
						  <div class="col-md-12 col-lg-6 col-xl-6 slider__left">
							  <h2>Misiones principales, secundarias, gremio, compañeros...</h2>
						  </div>
					  </div>
				 </div>
			  </div>
		  </div>
		  
		  <!-- # Slide3 -->
		  <div class="carousel-item" style="background-image: url(images/slider3.png);">
			<div class="blackMask"></div>
			<div class="captionSlider">
				 <div class="container">
					  <div class="row d-flex align-items-center">
  
						  <!-- slider__left -->
						  <div class="col-md-12 col-lg-6 col-xl-6 slider__left">
							  <h2>Areas, objetos, bestiario...</h2>
						  </div>
					  </div>
				 </div>
			  </div>
		  </div>
		  
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
	  <!-- # END SLIDER -->

    <section>
		<div class="container">
		    <div class="row portada">
                <div class="col-md-6 float-left">
                    <h3>Exiled Quests</h3>
                    <p>Exiled Quest es una guia en castellano con todas las quests del juego de Exiled Kingdoms, puede servir de ayuda si te quedas atascado en 
                    una misión en particular o como referencia para ver que misiones estan disponibles. Aunque gran parte ha sido traducida de 
                    la propia wiki de Exiled Kingdoms, se han añadido gran cantidad de imágenes para localizar a los NPC y sus localizaciones, así
                    como los lugares exactos donde encontrar el objeto o personajes de la misión.
                    </p>
                </div>
				<div class="col-md-6"><img src="/images/portada1.png"></div>
			</div>
			<div class="row portada">
                <div class="col-md-6 float-right">
                    <h3>Exiled Kingdoms</h3>
                    <p>Exiled Kingdoms es un RPG de acción  para un jugador, desarrollado por 4 Dimension Games, que te permite recorrer libremente un mundo único.
                    Es un juego isométrico, inspirado en algunos de los mejores juegos de rol de las últimas décadas; 
                    recupera el viejo espíritu de los clásicos de muchas maneras: un entorno desafiante, 
                    elecciones con consecuencias y un sistema de juego sólido,
                    con diferentes caminos para desarrollar tu personaje.
                    </p>
                </div>
				<div class="col-md-6 "><img src="/images/portada2.png"></div>
			</div>
			<div class="row portada">
                <div class="col-md-6 info-content float-right">
                    <p>Explora el mundo: nadie te indicará los secretos mejor escondidos. Habla con cientos de personajes diferentes,
                    cada uno con diálogos únicos, y resuelve decenas de misiones. Personaliza tu personaje con docenas de habilidades y
                    cientos de elementos diferentes. Supera todo tipo de monstruos y antagonistas, eligiendo cuidadosamente las armas o poderes
                    para cada encuentro. Y regresa al clásico rastreo de mazmorras, con trampas y puertas secretas,
                    con la muerte esperando al incauto aventurero detrás de cada esquina.
                    </p>
                </div>
				<div class="col-md-6 img_info"><img src="/images/portada3.png" style="margin-top: -50px"></div>
			</div>	
			<div class="row portada">
                <div class="col-md-6 info-content float-left">
                    <h3>Actualizaciones</h3>
                    <span style="font-style: italic;">30/03/2020</span>
                    <a class="lead" href="/quest1.html">Una carta misteriosa</a>
                </div>  
            </div>
        </div>
        
    </section>

</body>
@endsection