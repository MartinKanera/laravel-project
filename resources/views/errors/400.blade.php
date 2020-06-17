<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>400 - bad request</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
<div id="app" class="d-flex flex-column justify-content-center align-items-center">
  <div class="d-flex flex-column" style="padding: 20px">
    <h1>400 - bad request</h1>
  </div>
</div>
</body>
</html>

<script type="text/javascript" src="js/app.js"></script>

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
