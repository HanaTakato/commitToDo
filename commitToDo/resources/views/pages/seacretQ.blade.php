<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>秘密の質問</title>
</head>
<body>
    <header>
        @include('shared.header1')
    </header>
    <div class="type">
        <div class="type_text">
            <h1>秘密の質問</h1>
            <form action="changePassword.php" method="POST">
                @csrf
                <p>Q.あなたの好きな食べ物は？</p>
                <input type="text" name='answer' class="textbox" placeholder="秘密の質問の答え">
                <input type="hidden" name='name' value="{{$name}}">
               <br> <input type="submit" value="解答" class="submit">
            </form>
        
            <a href="userName.php">ユーザー名入力画面へ →</a>
        </div>
        <div class="fin_wrap">
            <div class="right_img" id="chPa_img">
                <img src="images/Questions.png">
            </div>

        </div>

    </div>
    
</body>
</html>