<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <style>
        @font-face {
            font-family: 'hindi';
            src: url('{{ public_path("fonts/NotoSansDevanagari-VariableFont_wdth.ttf") }}');
        }.HN {
            font-family: 'hindi', sans-serif;
        }
    </style>
</head>
<body>

<h2> {{$title}} </h2>
<p class="HN">{!! nl2br($content) !!}</p>

</body>
</html>
