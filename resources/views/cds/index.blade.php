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
    <body>
      <div id="app" class="d-flex flex-column" style="">
        <div style="width: 100%; padding: 20px" class="d-flex justify-content-between">
          <a href="/genres">
            <button type="button" class="btn btn-link">Genres CRUD</button>
          </a>
          <a href="/cds/create">
            <button type="button" class="btn btn-dark">Add song</button>
          </a>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>
                Name
                <a href="/?scope=name&order=asc">
                  <button type="button" class="btn btn-link">ASC</button>
                </a>
                <a href="/?scope=name&order=desc">
                  <button type="button" class="btn btn-link">DESC</button>
                </a>
              </th>
              <th>
                Artist
                <a href="/?scope=artist&order=asc">
                  <button type="button" class="btn btn-link">ASC</button>
                </a>
                <a href="/?scope=artist&order=desc">
                  <button type="button" class="btn btn-link">DESC</button>
                </a>
              </th>
              <th>
                Release Year
                <a href="/?scope=release_year&order=asc">
                  <button type="button" class="btn btn-link">ASC</button>
                </a>
                <a href="/?scope=release_year&order=desc">
                  <button type="button" class="btn btn-link">DESC</button>
                </a>
              </th>
              <th>
                Genre
                <a href="/?scope=genre&order=asc">
                  <button type="button" class="btn btn-link">ASC</button>
                </a>
                <a href="/?scope=genre&order=desc">
                  <button type="button" class="btn btn-link">DESC</button>
                </a>
              </th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($cds as $cd)
            <a href="#">
              <tr>
                <td>{{ $cd->name }}</td>
                <td>{{ $cd->artist }}</td>
                <td>{{ $cd->release_year }}</td>
                <td>{{ $cd->genre_name }}</td>
                <td class="d-flex">
                  <form action="{{ route('cds.destroy', $cd->id) }}" method="POST" style="margin-right: 10px">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">DELETE</button>
                  </form>
                  <a href="/cds/{{ $cd->id }}/edit" style="margin-right: 10px">
                    <button type="button" class="btn btn-dark">EDIT</button>
                  </a>
                  <a href="/cds/{{ $cd->id }}" style="margin-right: 10px">
                    <button type="button" class="btn btn-dark">INFO</button>
                  </a>
                </td>
              </tr>
            </a>
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
