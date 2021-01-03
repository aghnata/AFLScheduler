<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <style type="text/css">
       .upper { text-transform: uppercase; }
       .lower { text-transform: lowercase; }
       .cap   { text-transform: capitalize; }
       .small { font-variant:   small-caps; }
    </style>
  </head>
  <body>
    {{ Session::get('message') }}
    <h1>All AFL List</h1>

    @foreach ($afls as $afl)
      <a href="/afl2/{{$afl->id}}"><strong><p class="upper">{{ $afl->title }}</p></strong></a>
      <p>{{ $afl->subject }}</p>
      <a href="/afl2/{{$afl->id}}/edit"> <button type="button" name="button">Edit</button> </a>

      <form class="" action="/afl2/{{$afl->id}}" method="post">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" name="name" value="delete">
      </form>

      <hr>
    @endforeach

  </body>
</html>
