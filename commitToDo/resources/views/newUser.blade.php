<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>ユーザー新規作成</title>
</head>
<body>
<header>
        @include('shared.header1')
    </header>
    <div class="type">
        <div class="type_text">
            <h1>ユーザー新規作成</h1>
            <form action="checkUser.php" method="POST">
            @csrf
            <p>好きなユーザー名、パスワードを設定しよう</p>
            <?php if(session()->has('search_er')): ?>
                <p style="color: red;">
                <?php echo session('search_er'); ?>
                </p>
                <?php endif; ?>

            <?php if(session()->has('name_er')): ?>
                <p style="color: red;">
                <?php echo session('name_er'); ?>
                </p>
                <?php endif; ?>
            <input type="text" class="textbox" name="name" placeholder="ユーザー名"><br>

            <?php if(session()->has('password_er')): ?>
                <p style="color: red;">
                <?php echo session('password_er'); ?>
                </p>
                <?php endif; ?>
            <input type="password" class="textbox" name="password" placeholder="パスワード"><br>
        
            <p>Q.あなたの好きな食べ物は？</p>
            
            <?php if(session()->has('answer_er')): ?>
                <p style="color: red;">
                <?php echo session('answer_er'); ?>
                </p>
                <?php endif; ?>
            <input type="text" class="textbox" name="answer" placeholder="秘密の質問の答え"><br>
            
                <input type="submit" class="submit" value="送信">
            </form>
            <a href="index.php">トップへ戻る</a>
            <?php session()->flush(); ?>
        </div>

        <div class="left_img" id="new_img">
        <img src="images/setup.png" alt="PC女性">
        </div>
    </div>
</body>
</html>