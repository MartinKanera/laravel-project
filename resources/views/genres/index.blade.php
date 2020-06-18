<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Genres CRUD</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
<div id="app" class="d-flex flex-column" style="">
  <div style="width: 100%; padding: 20px" class="d-flex justify-content-between">
    <a href="/">
      <button type="button" class="btn btn-link">CDs CRUD</button>
    </a>
    <a href="/genres/create">
      <button type="button" class="btn btn-dark">Add genre</button>
    </a>
  </div>
  <table class="table">
    <thead class="thead-dark">
    <tr>
      <th>
        Name
        <a href="/genres/?order=asc">
          <button type="button" class="btn btn-link">ASC</button>
        </a>
        <a href="/genres/?order=desc">
          <button type="button" class="btn btn-link">DESC</button>
        </a>
      </th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($genres as $genre)
      <tr>
        <td>{{ $genre->genre_name }}</td>
        <td class="d-flex">
          <form action="{{ route('genres.destroy', $genre->genre_id) }}" method="POST" style="margin-right: 10px">
            @method('DELETE')
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">DELETE</button>
          </form>
          <a href="/genres/{{ $genre->genre_id }}/edit" style="margin-right: 10px">
            <button type="button" class="btn btn-dark">EDIT</button>
          </a>
          <a href="/genres/{{ $genre->genre_id }}">
            <button type="button" class="btn btn-dark">INFO</button>
          </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
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
