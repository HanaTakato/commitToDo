<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Goal設定 - 完了 -</title>
</head>
<body>
<header>
        @include('shared.header2')
    </header>
    <div class="type">
        <div class="type_text1">
        <span class="stepSpanFin">step Fin.</span>
            <h1 class="finh1">Goal設定 - 完了 -</h1>
            <p class="finP">ここまでお疲れ様でした。</p>
            <p class="finP">目標は明確になりましたか？</p>
        
            <p class="finP2" id="finP2">設定した目標を達成すべく、</p>
            <p class="finP2">タスクを組んでいきましょう！</p>
        
            <a href="taskManagement.php">
                <button class="finBtn">タスク管理画面へ</button>
            </a>
        </div>
        <div class="img_wrap">
            <div class="fin_img">
                <img src="images/GoalComplete.png" alt="">
            </div>
        </div>

    </div>
    
</body>
</html>