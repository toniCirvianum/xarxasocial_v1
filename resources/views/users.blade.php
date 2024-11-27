<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LLista d'usuaris</h1>
    @foreach ($users as $user)
        <h3> {{ $user->name }} {{ $user->surname}}</h3>
        @if (count($user->images)>0) 
            <h4>Imatges de {{ $user -> nick }}</h4>
            <ul>
                @foreach ($user->images as $image)
                <li>
                    <p>{{ $image->id}}:{{ $image->image_path}}</p>
                    <p>LIKES: {{ count($image->likes) }}</p>
                    @if (count($image->comments)>0) 
                    <p> <strong>Comentaris: </strong></p>
                        @foreach ($image->comments as $comment)
                            <p>{{ $comment->content}} fet per  {{ $comment->user->nick}}</p>
                        @endforeach
                    @endif
                </li>

                @endforeach
            </ul>
        @endif
        <hr>

    @endforeach

    
</body>
</html>