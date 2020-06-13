<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    pending: {{$features_count->pending}}
    accepted: {{$features_count->accepted}}
    rejected: {{$features_count->rejected}}

    <br>
    <br>
    <form action="/" method="GET">
        <input value="{{request('search')}}" type="text" name="search">
    </form>

    <ul>
        @foreach($users as $user)
        <li>{{$user->name}} - {{$user->email}} - {{$user->company->name}} - {{optional(optional($user->lastLogin)->created_at)->diffForHumans()}}</li>
        @endforeach
    </ul>

    {{$feature->id}}
    <ul>
        @foreach($feature->comments as $comment)
        <li style="{{$comment->isAuthor() ? 'font-weight: bold' : ''}}">{{$comment->body}}</li>
        @endforeach
    </ul>
</body>

</html>