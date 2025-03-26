<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoリスト</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Tasks</h1>

    <ul>
        @foreach($tasks as $task)
        <li>{$task->name}</li>
        @endforeach
    </ul>
</body>
</html>