<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Edit - {{ $cd->name }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
<div id="app" class="d-flex justify-content-center align-items-center" style="">
  <div style="padding: 20px" class="d-flex">
    <form action="/cds/{{ $cd->id }}" enctype="multipart/form-data" method="POST">
      @method('PATCH')
      @csrf
      <div class="">
        <div>
          <h1>Edit CD</h1>
        </div>
        <div class="form-group row">
          <label for="name" class="col-form-label">CD Name</label>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $cd->name }}" autocomplete="name">

          @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
          <label for="artist" class="col-form-label">Artist</label>
          <input id="artist" type="text" class="form-control @error('artist') is-invalid @enderror" name="artist" value="{{ $cd->artist }}" autocomplete="artist">

          @error('artist')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group row">
          <label for="release_year" class="col-form-label">Release year</label>
          <input id="release_year" type="number" class="form-control @error('release_year') is-invalid @enderror" name="release_year" value="{{ $cd->release_year }}" autocomplete="release_year">

          @error('release_year')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
          <label for="genre" class="col-form-label">Genre</label>
          <select id="genre" name="genre_id">
            @foreach($genres as $genre)
              <option @if($genre->genre_id == $cd->genre_id) selected @endif value="{{ $genre->genre_id }}">{{ $genre->genre_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="row">
          <label for="cover" class="col-form-label">CD Cover</label>
          <input type="file" class="form-control-file" id="cover" name="cover">

          @error('cover')
          <strong>{{ $message }}</strong>
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
