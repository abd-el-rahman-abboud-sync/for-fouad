<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Administrator</title>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
        }
        .container {
            width: 60%;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 20px; /* Increased border-radius for rounder corners */
        }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .button-container {
            text-align: right; /* Aligns the button to the right */
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0069d9;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Administrator</h2>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <form action="{{ route('user.update', $user->IDAdmin) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $user->NameAdmin }}">

        <label for="email" class="required">Username:</label>
        <input type="text" id="username" name="username" value="{{ $user->UsernameAdmin   }}">

        <label for="email" class="required">AccessType:</label>
        <input type="text" id="access_type" name="access_type" value="{{ $user->AccessType }}">

        <label for="email" class="required">Status:</label>
        <input type="text" id="status" name="status" value="{{ $user->Status }}">

        <div class="button-container">
            <input type="submit" value="Update User">
        </div>
    </form>
</div>

</body>
</html>
