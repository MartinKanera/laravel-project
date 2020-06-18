<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $newCd['name'] }} - {{ $newCd['artist'] }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
<div id="app" class="d-flex flex-column justify-content-center align-items-center">
  <div class="d-flex flex-column bg-dark text-white" style="padding: 20px">
    <img src="/storage/{{ $newCd['cover'] }}" height="256" width="256" />
    <span style="margin-top: 20px">{{ $newCd['name'] }}</span>
    <span>{{ $newCd['artist'] }}</span>
    <span>{{ $newCd['release_year'] }}</span>
    <span>{{ $newCd['genre_name'] }}</span>
  </div>
</div>
</body>
</html>

<style>
  html, body {
    background-color: #fff;
    color: #636b6f;
    font-weight: bold;
    height: 100vh;
    width: 100vw;
    margin: 0;
  }

  #app {
    width: 100%;
    height: 100%;
  }
</style>
