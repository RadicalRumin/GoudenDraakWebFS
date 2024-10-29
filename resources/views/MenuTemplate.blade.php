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
    <div style="page-break-before: always;">
        <h1>Aanbiedingen</h1>
        @isset($specials)
            <ul>
                @foreach($specials as $special)
                    <li>{{ $special }}</li>
                @endforeach
            </ul>
        @else
            <h2>Er zijn geen aanbiedingen op dit moment!</h2>
        @endisset
    </div>
</body>
</html>
