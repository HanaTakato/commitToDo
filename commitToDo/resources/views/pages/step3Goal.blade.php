<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Goal設定 - image up -</title>
</head>
<body>
<header>
        @include('shared.header1')
    </header>
    <div class="step3">
        <div class="step3text">
        <span class="stepSpan3">step 3/3</span>
            <h1>Goal設定 - image up -</h1>
            <p class="step3P">目標：<?php echo session('goal'); ?></p>
            <p  class="step3P">理由①：<?php echo session('reason1'); ?></p>
            <?php if(session()->has('reason2')): ?>
            <p  class="step3P">理由②：<?php echo session('reason2'); ?></p>
            <?php endif; ?>
            <?php if(session()->has('reason3')): ?>
                <p  class="step3P">理由③：<?php echo session('reason3'); ?></p>
                <?php endif; ?>
        
                <div class="step3sub">
                    <p  class="step3P">理由を掘り下げられたみたいですね。</p>
                    <p  class="step3P">では次に、あなたの目標が達成されたときに、したいことはありますか？</p>
                    <p  class="step3P">買いたい物や、見せたい人、行きたい場所など、自由に具体的に記入してみましょう。</p>
                </div>
        
            <form action="finGoal.php" method="POST">
                @csrf
                <!-- <input type="textarea" name="want"> -->
                <?php if(session()->has('want_er')): ?>
                    <p style="color: red;">
                        <?php echo session('want_er'); ?>
                        <?php session()->forget('want_er'); ?>
                    </p>
                    <?php endif;  ?>
                <textarea name="want" id="want" cols="30" rows="10" placeholder="例）カルバンクラインの水着を買う"></textarea>
                <input type="submit" id="wantSubmit" value="イメージアップOK">
            </form>
        </div>
        <div class="step3_img_wrap">
            <div class="step3_img">
                <img src="images/imageUp.png" alt="">
            </div>
        </div>
    </div>
    
</body>
</html>