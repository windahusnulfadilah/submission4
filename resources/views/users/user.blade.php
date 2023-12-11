<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index User</title>
</head>
<body>
    {{ $id }}
<h1>Data Users</h1>
<input type="text" value={{$id}}>
@foreach ($data as $u)
<ul>
    <li>{{ $u['nama'] }}</li>
    <li>{{ $u['email'] }}</li>
    <li>{{ $u['telp'] }}</li>
    <li>{{ $u['alamat']['street'] }}, {{ $u['alamat']['postcode'] }}</li>
</ul>
@endforeach

</body>
</html>
