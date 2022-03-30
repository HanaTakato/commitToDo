<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>パスワード変更</title>
</head>

<body>
<header>
        @include('shared.header1')
    </header>
    <div class="type">
        <div class="type_text">
            <h1>パスワード変更画面</h1>
            <form action="finPassword.php" method="post">
                @csrf
        
                <input type="password" class="textbox" name="password" placeholder="新しいパスワード入力">
                <input type="hidden" name="id" value="{{$id}}">
                <br><input type="submit" value="変更" class="submit">
            </form>
            <a href="userName.php">ユーザー名入力画面へ →</a>
        </div>
        <div class="fin_wrap">
            <div class="right_img" id="chPa_img">
            <img src="images/password.png">
            </div>
        </div>
    </div>
</body>

</html>