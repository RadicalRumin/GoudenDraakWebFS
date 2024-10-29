<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <h1>Restaurant Menu</h1>
    <ul>
        @foreach($menuItems as $item)
            <li>{{ $item->name }} - {{ $item->price }}</li>
        @endforeach
    </ul>
</body>
</html>
