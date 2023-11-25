<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Login</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            background: #f1f1f1;
        }

        .login-box {
            width: 400px;
            height: 400px;
            background: #fff;
            color: #333;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
            padding: 70px 30px;
        }

        .login-box h2 {
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 28px;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #333;
            margin-bottom: 30px;
            border: none;
            border-bottom: 2px solid #333;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #333;
            pointer-events: none;
            transition: 0.5s;
        }

        .login-box .user-box input:focus~label,
        .login-box .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #333;
            font-size: 12px;
        }

        /* .login-box a {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: white;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: 0.5s;
    margin-top: 40px;
    background-color:rgb(4, 115, 4);
  } */



        .login-box a span {
            position: absolute;
            display: block;
        }

        .login-box a span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;

        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .err {
            margin-top: 50px;
            color: white;
            background-color: rgb(254, 146, 146);
            width: 100%;
            padding: 5px;
            margin: auto;
            margin-bottom: 10px;

        }
    </style>
</head>

<body>

    <div class="login-box">

        <h2>Login Admin</h2>
        @if ($ada === '1')
            <div class="err">

                <p>Username atau password salah!!</p>
            </div>
        @endif
        <form action="/login/validasi" method="POST">
            @csrf
            <div class="user-box">
                <input type="text" name="username" required onfocus="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>

            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input type="submit" value="Login" name="login">
            </a>
        </form>
    </div>
</body>

</html>
