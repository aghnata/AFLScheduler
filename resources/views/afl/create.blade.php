<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create</title>
  </head>
  <body>

    <h1>Create AFL Post</h1>

    <form class="" action="/afl2" method="post">
      <input type="text" name="title" value="" placeholder="judul">
      {{ ($errors->has('title')) ? $errors->first('title') : '' }}
      <br> <br>
      <textarea name="subject" rows="8" cols="40" placeholder="isi.."></textarea><br>
      {{ ($errors->has('subject')) ? $errors->first('subject') : '' }}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" name="name" value="post">
    </form>
  </body>
</html>
