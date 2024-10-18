<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .table-container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px; /* Rounded corners for the container */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Delete Button Styling */
        input[type="submit"] {
            padding: 6px 12px;
            background-color: #d9534f; /* Red background */
            color: white;
            border: none;
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
            font-weight: bold; /* Bold text */
            margin-left: 5px; /* Add some spacing between the edit link and button */
        }

        input[type="submit"]:hover {
            background-color: #c9302c; /* Darker red on hover */
        }
        .success-message {
             /* Light green background */
            color: #3c763d; /* Dark green text */
            padding: 10px;
            border-radius: 5px; /* Rounded corners */
            margin-bottom: 20px; /* Space below the message */
            text-align: center; /* Center the message */
            display: inline-block; /* Make it fit around the text */
            width: 100%; /* Full width */
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .table-container {
                width: 100%;
                padding: 10px;
            }

            table, th, td {
                font-size: 14px;
            }

            input[type="submit"] {
                font-size: 14px; /* Smaller font size for buttons on mobile */
            }
        }
    </style>
</head>
<body>
    <h1>Product List</h1>
    <div class="success-message" >
        @if (session()->has('success'))
            <div>
                {{ Session('success') }}
            </div>
        @endif
    </div>
    <div class="table-container">
        <div>
            <a href="{{ route('product.create') }}">Create a product</a>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('product.delete', ['product' => $product]) }}" style="display: inline;"> <!-- Keep form inline -->
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
