<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Información del concierto</title>
</head>
<body>
    <h1>A continuación le comunicamos los datos del concierto </h1>
    <p>Nombre del Promotor: {{ $mailData['name'] }}</p>
    @if ($mailData['profitability'] > 0)
        <p>Los beneficios han sido de: {{ $mailData['profitability'] }}</p>
    @else
        <p>Las perdidas han sido de: {{ $mailData['profitability'] }}</p>
    @endif
</body>
</html>