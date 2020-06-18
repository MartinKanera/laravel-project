<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $genre_data->genre_name }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
<h1 style="margin: 50px; display: block">{{ $genre_data->genre_name }}</h1>
<div id="app" class="d-flex justify-content-center align-items-center flex-wrap">
  @foreach($cds as $cd)
    <div class="d-flex flex-column bg-dark text-white" style="padding: 20px; margin: 20px">
      <img src="/storage/{{ $cd->cover }}" height="256" width="256" />
      <span style="margin-top: 20px">{{ $cd->name }}</span>
      <span>{{ $cd->artist }}</span>
      <span>{{ $cd->release_year }}</span>
    </div>
  @endforeach
</div>
</body>
</html>

<style>
  html, body {
    background-color: #fff;
    color: #636b6f;
    font-weight: bold;
    margin: 0;
  }
</style>
