@extends('layouts.app' ,
    [ 'metatitle' => $metatitle ?? $area->nombre]
)

@section('content')

<body class="int fondo">

	<!-- # SLIDER INT -->
	<section class="slider-int" style="background-image: url({{ asset('uploads/'.$categoria->imagen) }}); background-attachment: inherit;">
	    <div class="container">
            <div class="row">
                <div class="col">
                    <h1 style="color: #682116">{{ $area->nombre }}</h1>
                </div>
            </div>
	    </div>
	</section>
	<!-- # END SLIDER INT -->
	
    <!-- # MAIN CONTENT -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Area -->
                <div class="col-12">



                <!-- <div class="row">
                    <div class="col-md-6">
                        <h3>Exiled Kingdoms</h3>
                        <p>Exiled Kingdoms es un RPG de acción  para un jugador, desarrollado por 4 Dimension Games, que te permite recorrer libremente un mundo único.
                        Es un juego isométrico, inspirado en algunos de los mejores juegos de rol de las últimas décadas; 
                        recupera el viejo espíritu de los clásicos de muchas maneras: un entorno desafiante, 
                        elecciones con consecuencias y un sistema de juego sólido,
                        con diferentes caminos para desarrollar tu personaje.
                        </p>
                    </div>
				    <div class="col-md-6"><img src="/images/portada2.png"></div>
			    </div>	 -->



                <div class="row">
                    <div class="col-md-6">
                        <img class="info-content" src="{{ asset('uploads/'.$area->imagen) }}">
                    </div>
                    <div class="col-md-6" style="margin-top: 50px">
                        <!-- LEYENDA -->
                        @if($leyenda)
                        @php $num=0 @endphp
                            @foreach($leyenda as $val)
                            
                            <div style="position:absolute;left: {{$val['left']}}px;top: {{$val['top']}}px; line-height:95%; z-index:1;">
                                <div class="map">
                                    <span title="{{ $val['name']}}" class="map-title">{{ $val['num'] }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="leyenda">
                                @if($num != $val['num'])
                                    <span class="leyenda-num">{{ $val['num'] }}</span>
                                    <span>{{ $val['name'] }}</span>
                                @endif
                                @php $num = $val['num'] @endphp
                                </div>
                            </div>
                            
                            @endforeach
                        @endif
                    </div>
                </div>


                    <!-- END LEYENDA -->

                    <div>
                      <p>{!! $area->descripcion !!}</p>
                    </div>
                    <div>
                        <p>NPCs</p><hr>
                        @foreach($area->npc as $npc)
                        <div>
                            <a href="#">{{ $npc->nombre }}</a>
                        </div>
                        @endforeach
                    </div>
                    <span style="display:block; height: 20px;"></span>
                    <div>
                        <p>QUESTS</p><hr>
                        @foreach($area->quest as $quest)
                        <div>
                            <a href="#">{{ $quest->nombre }}</a>
                        </div>
                        @endforeach
                    </div>                    
                    <span style="display:block; height: 80px;"></span>
                </div>
                
            </div>

        </div>
    </section>

</body>

@endsection