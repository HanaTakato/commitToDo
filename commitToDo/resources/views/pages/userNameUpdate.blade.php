<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>ユーザー名変更</title>
</head>
<body>
<header>
        @include('shared.header2')
    </header>
    <div class="type">
        <div class="type_text">
            <h1>ユーザー名変更</h1>
            <form action="updUserName.php" method="post">
            <span class="mygoal_span">ユーザー名：</span><input type="text" class="textbox" name="name" value=<?php echo session('userName'); ?>><br>
                <input type="submit" class="submit" value="編集完了">
            </form>
        </div>
    </div>
</body>
</html>