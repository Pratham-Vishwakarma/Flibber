<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Research Paper</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/antd/4.16.13/antd.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Dark Theme Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #181a1b;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #eaeaea;
            margin: 0;
        }

        .upload-container {
            background-color: #333;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            width: 400px;
        }

        .upload-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #eaeaea;
        }

        .upload-container form div {
            margin-bottom: 15px;
        }

        .upload-container label {
            font-weight: bold;
            color: #eaeaea;
        }

        .upload-container input,
        .upload-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #555;
            background-color: #444;
            color: #eaeaea;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .upload-container input:focus,
        .upload-container textarea:focus {
            outline: none;
            border-color: #4a90e2;
        }

        .success-message, .error-message {
            text-align: center;
            margin-bottom: 10px;
        }

        .success-message {
            color: #4caf50;
        }

        .error-message {
            color: #f44336;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2 class="text-xl text-bold">Upload Research Paper</h2>

        <!-- Success & Error Messages -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Upload Form -->
        <form action="{{ route('papers.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="4" required></textarea>
            </div>
            <div>
                <label for="file">Upload Paper (PDF):</label>
                <input type="file" name="file" id="file" accept=".pdf" required>
            </div>
	    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <x-secondary-button class="rounded-2xl p-4 px-8 transition ring-1 text-white bg-blue-500 hover:bg-blue-600 shadow-lg" style="font-size: 1.2em;">
            Upload
        </x-secondary-button>
    </div>
        </form>
    </div>
</body>
</html>
