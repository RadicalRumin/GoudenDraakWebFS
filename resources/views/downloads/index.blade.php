<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Download Orders</title>
</head>

<body>
    <div style="margin: 20px;">
        <h1>Download Daily Order Exports</h1>
        <ul>
            @foreach ($files as $file)
                <li>
                    <a href="{{ route('exports.download', $file) }}">
                        {{ $file }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>


</body>

</html>