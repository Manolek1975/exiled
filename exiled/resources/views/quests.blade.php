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
                        <ul style="padding-left: 20px;"><li>{{ $quest->nombre }}</li></ul>
                        <p>{!! $quest->descripcion !!}</p>
                    </div>
                    <div>
                        <p>Inicio</p><hr>
                        <p>{!! $quest->inicio !!}</p>
                        <img class="inicio" src="{{ asset('uploads/'.$quest->imagen) }}">
                    </div>
                    <div>
                        @if($progreso)
                            <p>Progreso</p><hr>
                            @foreach($progreso as $val)
                                <span>{{ $val['num'] }}.-{{ $val['desc'] }}</span><br />
                                
                            @endforeach
                        @endif
                        <span style="display:block; height: 40px;"></span>
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

                </div>
            </div>
        </div>
    </section>

</body>
@endsection