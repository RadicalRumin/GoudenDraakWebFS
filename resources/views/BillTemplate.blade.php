<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>
        .qr-code {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Restaurant Menu</h1>
    <ul>
        @if(isset($orderItems))
            @foreach($orderItems as $item)
                <li>{{ $item->quantity }}× {{ $item->dish->name }} - {{ $item->quantity*$item->dish->price}}</li>
            @endforeach
            <li><strong>Total: {{ $orderTotal }}</strong></li>
        @endif
    </ul>
    <div style="page-break-before: always;">
        <h1>Review Formulier</h1>
        <p>Scan de onderstaande QR Code om een review achter te laten!</p>
        <div class="qr-code">
            <img src="{{ $qrCodeUrl }}" alt="QR Code">
        </div>
        
    </div>
</body>
</html>
