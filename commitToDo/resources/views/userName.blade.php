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
            <h1>ユーザー名は覚えていますか？</h1>
            <form action="seacretQ.php" method="post">
                @csrf
                
                <?php if(session()->has('password_er')): ?>
                    <p style="color: red;">
                        <?php echo session('password_er'); ?>
                    </p>
                <?php elseif(session()->has('search_er')): ?>
                    <p style="color: red;">
                        <?php echo session('search_er'); ?>
                    </p>
                <?php elseif(session()->has('answer_er')): ?>
                    <p style="color: red;">
                        <?php echo session('answer_er'); ?>
                    </p>

                <?php elseif(session()->has('answerCheck_er')): ?>
                    <p style="color: red;">
                        <?php echo session('answerCheck_er'); ?>
                </p>
                
                <?php elseif(session()->has('name_er')): ?>
                    <p style="color: red;">
                        <?php echo session('name_er'); ?>
                    </p>
                <?php elseif(session()->has('exist_er')): ?>
                    <p style="color: red;">
                        <?php echo session('exist_er'); ?>
                    </p>
                    <?php endif; ?>
                <input type="text" name='name' class="textbox" placeholder="ユーザー名"><br>
                <input type="submit" value="続ける" class="submit">
            </form>
            <a href="index.php">トップへ戻る →</a>
            <?php session()->flush(); ?>
        </div>
        <div class="left_img">
                <img src="images/forgot_pass.png" alt="道案内男性">
            </div>
    </div>
</body>
</html>