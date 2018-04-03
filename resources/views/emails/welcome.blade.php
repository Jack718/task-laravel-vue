<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test email</title>
</head>
<body>
    <h1> Hi , {{ $user->name }}</h1>
    <p> This is your own TaskManager</p>
    <p>您的登录游戏是:{{ $user->email }}</p>
</body>
</html>