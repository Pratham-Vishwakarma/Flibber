<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Research Papers</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Dark theme styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #1a202c; /* Dark background */
            color: #e2e8f0; /* Light text color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 900px;
            background-color: #2d3748; /* Darker container */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            font-size: 26px;
            color: #cbd5e0; /* Light header color */
            margin-bottom: 20px;
        }
        #no-papers-message {
            text-align: center;
            font-size: 18px;
            color: #a0aec0;
        }
        /* Search and Upload buttons */
        #papers-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #4a5568;
            background-color: #2d3748;
            color: #e2e8f0;
            width: 60%;
        }
        a.bg-blue-500 {
            background-color: #4299e1;
            padding: 10px 20px;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        a.bg-blue-500:hover {
            background-color: #2b6cb0;
        }
        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #4a5568;
            text-align: left;
        }
        th {
            background-color: #4a5568;
            color: #e2e8f0;
            font-weight: bold;
        }
        tbody tr:hover {
            background-color: #2a4365;
        }
        .text-blue-400 {
            color: #63b3ed;
            text-decoration: underline;
        }
        .text-blue-400:hover {
            color: #4299e1;
        }
        /* Pagination links */
        #pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a, .pagination span {
            color: #e2e8f0;
            padding: 8px 12px;
            margin: 0 5px;
            border-radius: 5px;
            text-decoration: none;
        }
        .pagination a:hover {
            background-color: #4a5568;
        }
        .pagination .active {
            background-color: #2b6cb0;
            color: #fff;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-200">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Community Research Papers</h1>

        <!-- Check if there are no papers -->
        @if($papers->isEmpty())
            <p class="text-center text-gray-400" id="no-papers-message">No research papers available in the community.</p>
        @else
            <!-- Search and Upload Paper Links -->
            <div class="flex items-center mb-6 space-x-4" id="papers-container">
                <input type="text" class="w-2/3 p-2 rounded bg-gray-700 text-gray-200 placeholder-gray-400" placeholder="Search papers...">
                <x-secondary-button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition">Search</x-secondary-button>
            </div>

            <!-- Table for displaying papers -->
            <table class="min-w-full table-auto border-collapse border border-gray-700" id="papers-table">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border border-gray-700 bg-gray-800 text-left text-gray-300">Title</th>
                        <th class="px-4 py-2 border border-gray-700 bg-gray-800 text-left text-gray-300">Description</th>
                        <th class="px-4 py-2 border border-gray-700 bg-gray-800 text-left text-gray-300">Uploaded By</th>
                        <th class="px-4 py-2 border border-gray-700 bg-gray-800 text-left text-gray-300">File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($papers as $paper)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-2 border border-gray-700">{{ $paper->title }}</td>
                            <td class="px-4 py-2 border border-gray-700">{{ $paper->description }}</td>
                            <td class="px-4 py-2 border border-gray-700">{{ $paper->user->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-2 border border-gray-700">
                                <a href="{{ asset('storage/' . $paper->file_path) }}" target="_blank" class="text-blue-400 underline hover:text-blue-300 transition">
                                    View Paper
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="mt-6 flex justify-center">
                {{ $papers->links() }}
            </div>
        @endif
    </div>
</body>

</html>
