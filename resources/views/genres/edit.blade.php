<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Edit - {{ $genre_data->genre_name }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
<div id="app" class="d-flex justify-content-center align-items-center" style="">
  <div style="padding: 20px" class="d-flex">
    <form action="/genres/{{ $genre_data->genre_id }}" enctype="multipart/form-data" method="POST">
      @method('PATCH')
      @csrf
      <div class="">
        <div>
          <h1>Edit Genre</h1>
        </div>
        <div class="form-group row">
          <label for="genre_name" class="col-form-label">Genre Name</label>
          <input id="genre_name" type="text" class="form-control @error('genre_name') is-invalid @enderror" name="genre_name" value="{{ $genre_data->genre_name }}" autocomplete="genre_name">

          @error('genre_name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="row mt-4" style="width: 100%">
          <button class="btn btn-primary" style="width: 100%">Save changes</button>
        </div>
      </div>
    </form>
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
