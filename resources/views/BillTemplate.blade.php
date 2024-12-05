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
        @foreach($orderItems as $item)
            <li>{{ $item->name }} - {{ $item->price }}</li>
        @endforeach
    </ul>
    <div style="page-break-before: always;">
        <h1>Review Formulier</h1>
        <p>Scan de onderstaande QR Code om een review achter te laten!</p>
        <div></div>
    </div>
</body>
</html>
