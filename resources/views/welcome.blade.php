<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CD CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

    </head>
    @include('layouts.app')
    <body>
      <div id="app" class="d-flex align-items-center justify-content-center">
        <example-component></example-component>
        <?php
          dd($result);
        ?>
      </div>
    </body>
</html>

<script type="text/javascript" src="js/app.js"></script>

<style>
  html, body {
      background-color: #fff;
      color: #636b6f;
      font-weight: 200;
      height: 100vh;
      width: 100vw;
      margin: 0;
  }

  #app {
    width: 100%;
    height: 100%;
  }
</style>
