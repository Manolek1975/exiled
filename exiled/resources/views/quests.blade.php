@extends('layouts.app' ,
    [ 'metatitle' => $metatitle ?? $quest->nombre]
)

@section('content')

<body class="int fondo">

	<!-- # SLIDER INT -->
	<section class="slider-int" style="background-image: url(/images/principales.png);background-attachment: inherit;">
	    <div class="container">
            <div class="row">
                <div class="col">
                    <h1>{{ $quest->nombre }}</h1>
                </div>
            </div>
	    </div>
	</section>
	<!-- # END SLIDER INT -->
	
    <!-- # MAIN CONTENT -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Quests -->
                <div class="col-12">
                    <div class="mision">
                        <img src="{{ asset('uploads/'.$quest->imagequest) }}">
                    </div>
                    <div>
                        <p>Inicio</p><hr>
                        <p>{!! $quest->inicio !!}</p>
                        <p>Area: <a href="{{ $quest->area->id }}">{{ $quest->area->nombre }}</a></p>
                        <p>NPC: <a href="#">{{ $quest->npc->nombre }}</a></p>
                        <div>
                            @if($progreso)
                                <p>Progreso</p><hr>
                                @foreach($progreso as $val)
                                    <span>{{ $val['num'] }}.-{{ $val['desc'] }}</span><br />
                                    
                                @endforeach
                            @endif
                            <span style="display:block; height: 40px;"></span>
                        </div>

                        <!-- <div class="slider">
                            @foreach($quest->images as $image)
                            <div class="slide" id="slide">
                                <img src="{{ asset('/uploads/'.$image) }}" class="img-fluid" alt="Imagen principal">
                            </div>
                            @endforeach  
                        </div> -->



                        <!-- # SLIDER -->
                        <div id="slider">
                            <a href="#" class="control_next">></a>
                            <a href="#" class="control_prev"><</a>
                            <ul>
                            @foreach($quest->images as $image)
                                <li>
                                    <img src="{{ asset('/uploads/'.$image) }}" class="img-fluid" alt="Imagen principal">
                                </li>
                            @endforeach  
                            </ul>  
                        </div>
	                    <!-- # END SLIDER -->
                    </div>


                    <div>
                        <p>Guía</p><hr>
                        <p>{!! $quest->guia !!}</p>
                        <img class="inicio" src="/images/Adaon.jpg">
                    </div>
                    <div>
                        <p>Recompensa</p><hr>
                        <a href="#">{{ $quest->objeto }}</a>
                        <p>{{ $quest->xp }} XP</p>
                    </div>
                    <span style="display:block; height: 80px;"></span>
                </div>
                
            </div>

        </div>
    </section>

</body>

@endsection