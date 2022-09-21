<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ciao Amministratore, è appena stato creato un nuovo post</h1>
   
    <div>Il titolo del post é: {{ $new_post->title }}</div>

    {{-- inserisco un link che riporti al singolo prodotto, quindi all show() della parte admin --}}
    <a href="{{route('admin.posts.show', ['post' => $new_post->id])}}">Clicca qui per visualizzare il post appena creato</a>
</body>
</html>