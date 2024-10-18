<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-container {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-messages {
            color: red;
            font-size: 0.9em;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }

            input[type="text"] {
                font-size: 14px;
            }

            input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <h1>Create a Product</h1>
    <div class="form-container">
        <form method="post" action="{{ route('product.store') }}">
            @csrf
            @method('post')

            <!-- Display validation errors -->
            <div class="error-messages">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Product Name -->
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter product name">
            </div>

            <!-- Product Quantity -->
            <div>
                <label for="qty">Qty</label>
                <input type="text" id="qty" name="qty" placeholder="Enter product quantity">
            </div>

            <!-- Product Price -->
            <div>
                <label for="price">Price</label>
                <input type="text" id="price" name="price" placeholder="Enter product price">
            </div>

            <!-- Product Description -->
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" placeholder="Enter product description">
            </div>

            <!-- Submit Button -->
            <div>
                <input type="submit" value="Save New Product">
            </div>
        </form>
    </div>
</body>

</html>
