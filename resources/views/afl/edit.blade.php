<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create</title>
  </head>
  <body>

    <h1>Edit AFL Post</h1>

    <form class="" action="/afl2/{{$afl->id}}" method="post">
      <input type="text" name="title" value="{{$afl->title}}" placeholder="judul"><br>
      {{ ($errors->has('title')) ? $errors->first('title') : '' }}
      <br>
      <textarea name="subject" rows="8" cols="40" placeholder="isi..">{{$afl->subject}}</textarea><br>
      {{ ($errors->has('subject')) ? $errors->first('subject') : '' }}

      <input type="hidden" name="_method" value="put">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" name="name" value="edit">
    </form>
  </body>
</html>
