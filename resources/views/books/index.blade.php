<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Data Buku</h2>

    @if (session('status'))
        <h4 style="color: green;">{{ session('status') }}</h4>
    @endif

    <form name="book-save-form" id="book-save-form" action="{{ url('/books/save-book') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td><input type="text" name="id" id="id" required></td>
            </tr>
            <tr>
                <td>Book Name</td>
                <td>:</td>
                <td><input type="text" name="book_name" id="book_name" required></td>
            </tr>
            <tr>
                <td>Author</td>
                <td>:</td>
                <td><input type="text" name="author" id="author" required></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit">Save</button>
                </td>
            </tr>
        </table>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Published Date</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $b)
            <tr>
                <td>{{ $b['id'] }}</td>
                <td>{{ $b['book_name'] }}</td>
                <td>{{ $b['author'] }}</td>
                <td>{{ $b['published_at'] }}</td>
                <td>
                    <form action="{{ url('/books/delete-book?id=') . $b['id'] }}" method="get">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
