@extends('layouts.app' ,
    [ 'metatitle' => $metatitle ?? 'Misiones '.$categoria->nombre]
)

@section('content')

<body class="int fondo">
	<!--[if lte IE 9]>
	    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- # SLIDER INT -->
	<section class="slider-int" style="background-image: url({{ asset('uploads/'.$categoria->imagen) }}); background-attachment: inherit;">
	    <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Misiones {{ $categoria->nombre }}</h1>
                </div>
            </div>
	    </div>
	</section>
	<!-- # END SLIDER INT -->
	
    <!-- # MAIN CONTENT -->
    <section>
        <div class="container" style="padding: 50px;">
            <div class="row portada">
                <!-- Quests -->
                <div class="col-12">
                    @foreach($quests as $quest)
                    <div class="mision">
                        <a href="/quests/{{ $quest->id }}" class="mision">
                            <ul><li>{{ $quest->nombre }}</li></ul>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</body>
@endsection