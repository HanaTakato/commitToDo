<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Goal設定ステップ２</title>
</head>

<body>
    <header>
        @include('shared.header1')
    </header>
    <div id="step2type">
        <div id="step2text">
            <span class="stepSpan2">step 2/3</span>
            <h1 id="step2h1">Goal設定 - reason -</h1>
            <p class="step2goal">"<?php echo session('goal'); ?>"</p>
            <p class="step2P">良い目標ですね！</p>
            <p class="step2P">では次に、その目標を達成する理由を考えてみましょう！</p>

            <p class="step2P"><span>"<?php echo session('goal'); ?>"</span>を達成したいのはなぜですか？（最低でも1回は、why?を問うてみましょう！）</p>

            <p class="step2P" id="p1"></p>
            <p class="step2P" id="p2"></p>
            <p class="step2P" id="p3"></p>

            <!-- <?php $data = session()->all(); ?>
            <?php var_dump($data); ?> -->

            <!-- 入力フォーム -->
            <div style="text-align: center;">
                <?php if (session()->has('reason_er')) : ?>
                    <p style="color: red;">
                        <?php echo session('reason_er'); ?>
                        <?php session()->forget('reason_er'); ?>
                    </p>
                <?php endif;  ?>
                <input type="text" id="reason" placeholder="例）痩せたいから">
                <input type="button" value="✔" id="step2Btn"><br>
            </div>

            <form action="step3Goal.php" method="post">
                @csrf
                <input type="hidden" name="reason1" value=<?php echo session('reason1'); ?>>
                <input type="submit" class="submit" id="step2submit" disabled style="background-color: gray;" value="入力終了">
            </form>
        </div>
        <div class="step2_img">
            <img src="images/reason.png" alt="">

        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    //登録ボタンが押されたときの処理
    //input要素内のvalueをDBに送信し保存＞保存した内容を表示させる(POST)

    $(function() {
        $("#step2Btn").click(function() {
            //テキストボックスの内容を取得
            let element = document.getElementById('reason');



            var json1 = {
                "reason": element.value, //値を取得
            };
            element.value='';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log(json1);
            $.ajax({
                url: "addReason.php", //アクセスするURLかディレクトリ
                type: "post", //POSTかGet
                contentType: "application/json",
                data: JSON.stringify(json1), //アクセスする時に必要なデータを記載
                dataType: "json", //データタイプの指定
            }).done(function(data1, textStatus, jqXHR) { //通信が成功した時の処理
                console.log(data1);
                console.log(data1.reason1); //eigyou
                console.log(data1.reason2); //eigyou
                console.log(data1.reason3); //eigyou
                data1.reason1 = String(data1.reason1).replace(/&/g, "&amp;")
                    .replace(/"/g, "&quot;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                $("#p1").text(JSON.stringify(data1.reason1));
                if (typeof data1.reason1 === 'undefined') {
                    console.log('reason1は定義されていません');
                } else {
                    document.getElementById('step2submit').disabled = false;
                    document.getElementById('step2submit').style.cssText = " background-color:tomato";
                }
                // data1.reason2 = String(data1.reason2).replace(/&/g, "&amp;")
                //     .replace(/"/g, "&quot;")
                //     .replace(/</g, "&lt;")
                //     .replace(/>/g, "&gt;")
                $("#p2").text(JSON.stringify(data1.reason2));
                // data1.reason3 = String(data1.reason3).replace(/&/g, "&amp;")
                //     .replace(/"/g, "&quot;")
                //     .replace(/</g, "&lt;")
                //     .replace(/>/g, "&gt;")
                $("#p3").text(JSON.stringify(data1.reason3));
                if (typeof data1.reason3 === 'undefined') {
                    console.log('reason3は定義されていません');
                } else {
                    document.getElementById('step2Btn').disabled = true;
                    document.getElementById('step2Btn').style.cssText = " background-color:gray";
                }
            }).fail(function(jqXHR, textStatus, errorThrown) { //通信が失敗した時の処理
                $("#p1").text("err:" + jqXHR.status); //例：404
                $("#p2").text(textStatus); //例：error
                $("#p3").text(errorThrown); //例：NOT FOUND
            }).always(function() {}); //通信の成否に関わらず実行する処理


        });
    });

    //常に実行されるもの
    //タスクテーブル内に存在する
</script>

</html>