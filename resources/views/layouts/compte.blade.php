<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    GESTION DES PRODUITS
  </title>
  <!-- Favicon -->
  <link href="{{asset('./assets2/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('./assets2/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{asset('./assets2/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('./assets2/css/argon-dashboard.css?v=1.1.2')}}" rel="stylesheet" />
</head>

<body class="">
  @include('config.nav_compte')
  @include('config.header')




    {{-- ******************************************************* --}}


{{-- *********************************************** --}}

   @yield('contenu')


 


  @include('config.foot_compte')