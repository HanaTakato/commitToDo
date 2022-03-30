<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>登録確認</title>
</head>

<body>
<header>
        @include('shared.header1')
    </header>
    <div class="type">
        <div class="type_text" id="chuser">
            <h1>登録確認</h1>
            <p id="chuserP">これで良いかな？</p>
            <br>
            <form action="registerUser.php" method="POST">
                @csrf
                <p>ユーザー名：{{$name}}</p>
                <input type="hidden" name="name" value="{{$name}}">
        
                <p>パスワード：{{$pass_val}}</p>
                <input type="hidden" name="hash" value="{{$hash}}">
        
                <p>秘密の答え：{{$answer}}</p>
                <input type="hidden" name="answer" value="{{$answer}}">
        
                <input type="submit" class="submit" value="完了">
            </form>
        
            <a href="index.php">トップへ戻る</a>
        </div>
        <div class="left_img">
        <img src="images/registerCheck.png" alt="プロファイリング">
        </div>
    </div>

</body>

</html>