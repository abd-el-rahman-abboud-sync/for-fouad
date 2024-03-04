<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SYNC - News Management System</title>
    <style>
          body {
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('uploads/login-bg.jpeg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center; 
            height: 100vh;
            margin: 0;
        }

        .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 80%;
    max-width: 1200px;
}


#login-container {
    margin-left: auto;
    background: #ffffff;
    padding: 60px;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 600px;
    height: 470px;
}

.sync-logo {
    width: 275px; 
    height: auto;
    margin-left: 5%;
}
        .login-header h1 {
            margin-top: 0; 
        }
        .login-header img {
            width: 100px; /* Adjust if you have a logo */
        }
        
        form {
            display: flex;
            flex-direction: column;
        }
        
        input[type=email]::placeholder, input[type=password]::placeholder {
    font-size: 18px;
    color: #ccc;
}

input[type=email], input[type=password], button[type=submit] {
    margin-bottom: 35px; 
    padding: 20px 30px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px; 
 
}

button[type=submit] {
    margin-top: 15px;
    background: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
    
}


        
        button:hover {
            background: #0056b3;
        }
    </style>        
</head>
<body>
    <div class="container2">
    <img src="{{ asset('uploads/sync-logo.png') }}" alt="SYNC Logo" class="sync-logo">
    <p style="font-size: 25px; color:#ffffff">News Management System</p>
</div>
    <div class="container">
        
        @if ($errors->any())
<div>
</div>
@endif

        <!-- Logo placed outside the login container -->
       
        <div id="login-container">
            <div class="login-header">

                <h1 style="text-align: center">Sign In</h1>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>
