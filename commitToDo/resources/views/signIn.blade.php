<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>サインイン</title>
</head>
<body>
<header>
        @include('shared.header1')
    </header>
    
    <div class="signIn_wrap">
        <div class="signIn_main">
            <h1>CommitToDoへサインイン</h1>
            <?php session()->forget('inUser'); ?>
            <form action="signIn.php" method="POST">
                @csrf
                <?php if(session()->has('name_er')): ?>
                    <p style="color: red;">
                        <?php echo session('name_er'); ?>
                        <?php session()->forget('name_er'); ?>
                    </p>
                    <?php endif;  ?>
                <input type="text" name="name" placeholder="ユーザー名" id="signIn_userName"><br>
               
                <?php if(session()->has('password_er')): ?>
                    <p style="color: red;">
                        <?php echo session('password_er'); ?>
                        <?php session()->forget('password_er'); ?>
                    </p>
                    <?php endif;  ?>
                <input type="password" name="password" placeholder="パスワード" id="signIn_password"><br>
                <input type="submit" value="サインイン" id="submit">
            </form>
    
            <p><a href="newUser.php">まだアカウントがない方はこちら →</a></p>
            <p><a href="userName.php">パスワードをお忘れですか？ →</a></p>
        </div>
        
            <div class="signIn_img">
                <img src="images/Sign_in.png" alt="道案内男性">
            </div>
    </div>
    
    


    
</body>
</html>