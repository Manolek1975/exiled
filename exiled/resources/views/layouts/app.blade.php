<!doctype html>
<html lang="es">

@include('layouts.head')

<body>
    <header>
        @include('layouts.header')
    </header>
	<main>
        @yield('content')
    </main>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>