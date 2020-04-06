<section>
	
    <div class="container">
        <div class="row">

		<!-- header__logo -->
		<div class="col-5 col-sm-2 logo-cont">
			<a href="/">
				<img id="logo" src="/images/logo.png" alt="">
			</a>
		</div>

		<!-- # MENU DESKTOP-->	
			<menu class="col-7 col-sm-10 ml-md-auto menu-cont">

				<nav class="navbar navbar-expand-lg main-menu">
				  <a class="navbar-brand" href="#">Navbar</a>

				  <button class="navbar-toggler" onclick="openNav()">&#9776;</button>

				  <div class="collapse navbar-collapse justify-content-end open-full" id="navbarTogglerDemo02">
				    <ul class="navbar-nav">
						@foreach($grupos as $grupo)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ $grupo->nombre }}</a>
							<div class="dropdown-menu">
							@foreach($categorias as $categoria)
								@if($categoria->grupo_id == $grupo->id)
									<a class="dropdown-item" href="/categorias/{{ $categoria->id }}">{{ $categoria->nombre }}</a>
								@endif
							@endforeach
							</div>
						</li>
						@endforeach
				    </ul>
				  </div>
				</nav>

			</menu>
		</div>
		<!-- # END MENU DESKTOP-->	

		<!-- # MENU MOBILE-->	
		<div id="fullsize" class="overlay">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div class="overlay-content" id="navbarTogglerDemo02">
				<ul class="navbar-nav ">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Quests</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="/quienes-somos.html">Principal</a>
							<a class="dropdown-item" href="/politica-calidad.html">Secundarias</a>
							<a class="dropdown-item" href="/certificaciones.html">Gremio</a>
							<a class="dropdown-item" href="/certificaciones.html">Compañeros</a>
							<a class="dropdown-item" href="/certificaciones.html">Encuentros</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Areas</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="/aguja.html" >Reinos</a>
							<a class="dropdown-item" href="/chuletero.html" >Ciudades</a>
							<a class="dropdown-item" href="/codillo.html" >Edificios</a>
							<a class="dropdown-item" href="/corteza.html" >Dungeons</a>
							<a class="dropdown-item" href="/cabeza.html" >Exteriores</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Equipo</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="/aguja.html" >Reinos</a>
							<a class="dropdown-item" href="/aguja.html" >Armaduras</a>
							<a class="dropdown-item" href="/cabeza.html" >Armas</a>
							<a class="dropdown-item" href="/chuletero.html" >Objetos</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Personaje</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="/chuletero.html" >Clases</a>
							<a class="dropdown-item" href="/chuletero.html" >Rasgos</a>
							<a class="dropdown-item" href="/chuletero.html" >Habilidades</a>
							<a class="dropdown-item" href="/aguja.html" >Reputación</a>
							<a class="dropdown-item" href="/cabeza.html" >Compañeros</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Varios</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="/cabeza.html" >Bestiario</a>
							<a class="dropdown-item" href="/cabeza.html" >NPCs</a>
							<a class="dropdown-item" href="/cabeza.html" >Curiosidades</a>
							<a class="dropdown-item" href="/chuletero.html" >Contacto</a>
							<a class="dropdown-item" href="/cabeza.html" >Ayuda</a>
						</div>
					</li>										
				</ul>
				<!-- <ul class="secondary-menu-mobile">
				    <li>
				        <a href="/internacional.html">Internacional</a>
				    </li>
				    <li>
				        <a href="/trabaja-con-nosotros.php">Trabaja con nosotros</a>
					</li>
					<li class="li-icons">
						<ul class="menu-mobile-icons">
							<li>
								<a href="/" ><img src="/images/icon-spain.jpg"></a> 
							</li>
							<li>
								<a href="/en/"> <img src="/images/icon-ingles.jpg"></a> 
							</li>
							<li>
								<a href="/ch/"> <img src="/images/icon-china.jpg"></a>
							</li>
						</ul>
					</li>
				</ul> -->
			</div>
		</div>
		<!-- # END MENU MOBILE-->

    </div>
</section>
      