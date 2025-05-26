<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>短縮URL-TOP</title>

    <!-- tailwindcss cdn -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg w-10/12">
        <h1 class="text-lg font-bold">短縮URL作成</h1>
        <form action="{{ route('urls.store') }}" id="url-form" method="post">
            @csrf
            <input type="text" name="original_url" id="original_url" class="border border-gray-300 p-2 my-2 w-full" placeholder="Enter URL" required>
            <button type="su7bmit" class="bg-blue-500 text-white p-2 mt-4 rounded w-full">短縮する</button>
        </form>
        <div id="result" class="mt-4"></div>
    </div>

    <script>
        const urlForm = document.querySelector('#url-form');

        
        
        urlForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            const originalUrl = document.querySelector('#original_url').value;


    
            try {
                const response = await fetch('/urls', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ original_url: originalUrl }),
                });
    
    
                const data = await response.json();
                document.querySelector('#result').innerHTML =
                    `<a href="${data.short_url}" target="_blank">${data.short_url}</a>`;
    
            } catch (e) {
                console.error(e.message);
                alert('サーバーでエラーが発生しました。');
            }
        });
    </script>
    
</body>
</html>
