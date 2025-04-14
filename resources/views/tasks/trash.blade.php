<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoリスト-ゴミ箱</title>

        <!-- tailwindcss cdn -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->  
</head>
<body class="bg-gray-300">
<div class="container mx-auto p-4">
        <nav class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">ゴミ箱</h1>
        </nav>

        <ul class="list-disc pl-5">
            @if($tasks->isNotEmpty())
                @foreach($tasks as $task)
                    <li class="mb-2">
                        <span>{{ $task->task_name }}</span>
                        <form action="{{ route('tasks.recover', $task->id) }}" method="post" class="inline"
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">復元</button>
                        </form>

                        <form action="{{ route('tasks.deleteTrash', $task->id) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">削除</button>
                        </form>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</body>
</html>
