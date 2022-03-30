<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>MyGoal設定</title>
</head>
<body>
<header>
        @include('shared.header2')
    </header>
    <div class="type">
        <div class="type_text">
            <h1>MyGoal設定</h1>
            <form action="myGoalUpd.php" method="post">
                @csrf
                <span class="mygoal_span"> G o a l : </span><input type="text" name="goal" class="textbox" value=<?php echo session('goal'); ?>><br>
                <span class="mygoal_span">Reason1:</span><input type="text" name="reason1"  class="textbox"  value=<?php echo session('reason1'); ?>><br>
                <span class="mygoal_span">Reason2:</span><input type="text" name="reason2"  class="textbox" value=<?php echo session('reason2'); ?>><br>
                <span class="mygoal_span">Reason3:</span><input type="text" name="reason3"  class="textbox" value=<?php echo session('reason3'); ?>><br>
                <span class="mygoal_span">I m a g e:</span><input type="text" name="image" class="textbox"  value=<?php echo session('image'); ?>><br>
                <input type="submit" class="submit" value="編集完了">
        
            </form>

        </div>
        
    </div>
    
</body>
</html>