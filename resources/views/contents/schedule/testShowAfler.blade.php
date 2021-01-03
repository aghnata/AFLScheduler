<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{url('/Schedule/All')}}"> Kembali ke menu penjdwalan</a>
    <br>
    Berikut list aflee yang sudah daftar aplikasi AFL:
  @foreach ($aflees as $aflee)
    <ul>
      <li>{{ $aflee->aflee_name }}</li>
    </ul>     
  @endforeach
</body>
</html>