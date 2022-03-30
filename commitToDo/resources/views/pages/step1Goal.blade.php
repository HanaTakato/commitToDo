<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Goal設定ステップ１</title>
</head>
<body>
<header>
        @include('shared.header1')
    </header>
    <div class="type">
        <div class="type_text" >
            <span class="stepSpan">step 1/3</span>
            <h1 id="step1h1">Goal設定</h1>
            <p id="step1P">あなたの達成したい目標を教えてください</p>
            <form action="step2Goal.php" method="post">
                @csrf
                <?php if(session()->has('goal_er')): ?>
                    <p style="color: red;">
                        <?php echo session('goal_er'); ?>
                        <?php session()->forget('goal_er'); ?>
                    </p>
                    <?php endif;  ?>
                    <?php
                    session()->forget('reason1');
                    session()->forget('reason2');
                    session()->forget('reason3');
                     ?>
                <input type="text" id="step1text" class="textbox" name="goal" placeholder=" 例）-5kg痩せる" >
                <input type="submit"  id="step1submit" value="✔︎">
            </form>
        </div>
        <div class="step1_img">
            <img src="images/Goal.png" alt="">
        </div>
    </div>
    
</body>
</html>