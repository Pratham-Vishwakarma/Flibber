<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Research Papers</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a202c; /* Dark background */
            color: #e2e8f0; /* Light text color */
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: #2d3748; /* Darker container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #cbd5e0; /* Light header color */
        }
        .alert-success {
            color: #48bb78; /* Green success text */
            background-color: #22543d; /* Dark green background */
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #4a5568; /* Border color */
        }
        th {
            background-color: #4a5568; /* Dark header */
            color: #e2e8f0; /* Light text */
        }
        tr:hover {
            background-color: #2a4365; /* Hover row */
        }
        a {
            color: #63b3ed; /* Light blue for links */
            text-decoration: underline;
        }
        .btn-danger {
            background-color: #e53e3e; /* Red delete button */
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-danger:hover {
            background-color: #c53030; /* Darker red on hover */
        }
        .table-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Uploaded Research Papers</h1>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($papers->isEmpty())
            <p>No research papers uploaded yet.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($papers as $paper)
                        <tr>
                            <td>{{ $paper->id }}</td>
                            <td>{{ $paper->title }}</td>
                            <td>{{ $paper->description }}</td>
                            <td>
                                <a href="{{ asset('storage/'.$paper->file_path) }}" target="_blank">View Paper</a>
                            </td>
                            <td class="table-actions">
                                <form action="{{ route('papers.destroy', $paper->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this paper?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>

