<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoリスト</title>

    <!-- tailwindcss cdn -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4 md:w-6/12">
        <nav class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Todoリスト</h1>
            <a href="{{ route('tasks.trash') }}" class="bg-gray-300 p-2 mb-2 rounded">ゴミ箱</a>
        </nav>

        <form action="{{ route('tasks.store') }}" method="post">
            @csrf
            <div class="mb-2">
                <div>
                    <div>
                        <label for="task_name" text-xs>タスク</label>
                    </div>
                    <input type="text" name="task_name" id="task_name" class="border border-gray-300 p-2 my-2 w-full">
                </div>

                <div>
                    <div>
                        <label for="due_time" class="text-xs"期限</label>
                    </div>
                    <input type="datetime-local" name="due_time" value="{{ now()->format('Y-m-d H:i') }}" id="due_time" class="border p-2 mb-2 w-full" >
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">追加</button>
            </div>
        </form>
    </div>

    <ul class="list-disc pl-5 text-sm md:w-6/12 mx-auto">
        @if($tasks->isNotEmpty())
            @foreach($tasks as $task)
                <li class="mb-2 flex  justify-between md:justify-normal">
                    <div>{{ $task->task_name }}: <span class="mx-1">{{ date('Y-m-d H:i', strtotime($task->due_date)) }}</span></div>    
                    <form action="{{ route('tasks.deleteTrash', $task->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Done!</button>
                    </form>
                </li>
            @endforeach
        @endif
    </ul>
</body>
</html>
