@extends('adminlte::page')

<meta name="theme-color" content="#c04b66">
<link rel="manifest" href="{{ asset('manifest.json') }}">
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="PWA">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="PWA">
<link rel="apple-touch-icon" href="{{ asset('assets/images/logo/logo.png') }}">


<meta name="description" content="Acompanhamento de pacientes com Dra Jessyca" />
<meta property="og:title" content="Dra Jessyca Martins" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://doctor.madgic.com.br/" />
<meta property="og:image" content="https://doctor.madgic.com.br//assets/images/logo/logo.png" />
<meta property="og:description" content="Dra Jessyca martins. Tenha seu acompanhamento na palma de sua mão" />
<meta property="og:site_name" content="Estética avançada | Dermatologia | Nutrologia" />

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/default/config.css') }}">
<link rel="stylesheet" href="{{ asset('config/main.css') }}">
<link rel="stylesheet" href="{{ asset('fileinput/css/fileinput.css') }}">

<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('{{asset('serviceworker.js')}}', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>

@section('title')
    @yield('page-title')
@endsection
@section('content_header')
    @include('includes.alerts')
@endsection

<script src="{{ asset('config/main.js') }}"></script>
<script src="{{ asset('js/libs/jquery.js') }}"></script>
<script src="{{ asset('js/utils/ElementProperty.js') }}"></script>
<script src="{{ asset('fileinput/js/fileinput.js') }}"></script>
<script src="{{ asset('js/service/Session.js') }}"></script>
<script src="{{ asset('js/libs/sweetalertmin.js') }}"></script>
<script src="{{ asset('js/utils/SwalCustom.js') }}"></script>
<script src="{{ asset('js/service/ConnectionServer.js') }}"></script>
<script src="{{ asset('js/service/Init.js') }}"></script>
<script src="{{ asset('js/utils/Mask.js') }}"></script>
<script src="{{ asset('js/service/MainServices.js') }}"></script>
<script src="{{ asset('js/utils/preloader.js') }}"></script>
