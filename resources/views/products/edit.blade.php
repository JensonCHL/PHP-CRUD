<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
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

        input[type="submit"],
        .return-button {
            width: 100%;
            padding: 10px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
            /* Center text in the button */
            text-decoration: none;
            /* Remove underline */
            display: inline-block;
            /* Make the anchor behave like a button */
        }

        input[type="submit"] {
            background-color: #4CAF50;
            /* Green background for update button */
        }

        input[type="submit"]:hover {
            background-color: #45a049;
            /* Darker green for hover */
        }

        .return-button {
            background-color: #007BFF;
            /* Blue background for return button */
        }

        .return-button:hover {
            background-color: #0056b3;
            /* Darker blue for hover effect */
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

            input[type="text"],
            input[type="submit"],
            .return-button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <h1>Edit a Product</h1>
    <div class="form-container">
        <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
            @csrf
            @method('put')

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
                <input type="text" id="name" name="name" placeholder="Product Name"
                    value="{{ $product->name }}">
            </div>

            <!-- Product Quantity -->
            <div>
                <label for="qty">Qty</label>
                <input type="text" id="qty" name="qty" placeholder="Quantity" value="{{ $product->qty }}">
            </div>

            <!-- Product Price -->
            <div>
                <label for="price">Price</label>
                <input type="text" id="price" name="price" placeholder="Price" value="{{ $product->price }}">
            </div>

            <!-- Product Description -->
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" placeholder="Description"
                    value="{{ $product->description }}">
            </div>

            <!-- Return Button -->
            <div>
                <a href="{{ route('product.index') }}" class="return-button">Return to Create Product</a>
            </div>

            <!-- Submit Button -->
            <div>
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
</body>

</html>
