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

        <div id="result" class="mt-4">
            <p>ShortURL: ${data.short_url}

                <button type="button" class="absolute mx-1 border border-gray-300 rounded hover:bg-slate-400">
                    
                    <!-- コピーアイコンボタン（クリック用） -->
                    <svg width="24" height="24" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="transition-colors duration-200">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                        <rect x="3" y="3" width="13" height="13" rx="2" ry="2"/>
                    </svg>
    
                </button>
            </p>
        </div>
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


        async function copyUrl() {
            const shortUrlText = document.querySelector('#result p');
            
                try {
                    await navigator.clipboard.writeText(shortUrlText.textContent);
                    alert('URLがクリップボードにコピーされました！');
                } catch (err) {
                    console.error('コピーに失敗しました:', err);
                    alert('コピーに失敗しました。');
                }
        }
    </script>
    
</body>
</html>
