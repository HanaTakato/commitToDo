<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/32d866f0a8.js" crossorigin="anonymous"></script>
    <title>タスク管理画面</title>
</head>

<body id="taskbody">
    <header>
        @include('shared.header2')
    </header>

    <?php $data = session()->all(); ?>
    <?php  ?><br>

    <div id="wrap_contents">
        <div id="left_contents">

            <div id="task_goal">
                <p>MyGoal</p>
                <p><?php echo session('goal'); ?></p>

            </div>
            <div id="task_reason1">
                <p>MyReason1</p>
                <p><?php echo session('reason1'); ?></p>
            </div>
            <?php if (session()->has('reason2')) : ?>
                <div id="task_reason2">
                    <p>MyReason2</p>
                    <p><?php echo session('reason2'); ?></p>

                </div>
            <?php endif; ?>
            <?php if (session()->has('reason3')) : ?>
                <div id="task_reason3">
                    <p>MyReason3</p>
                    <p><?php echo session('reason3'); ?></p>

                </div>
            <?php endif; ?>
            <div id="task_want">
                <p>MyImage</p>
                <p><?php echo session('image'); ?></p>

            </div>



            <div id="walk_image">
                <img src="images/road.png" alt="目標に向かって突き進む人">
            </div>
            <div class="task_complete">
                <h3>complete</h3>
                <div id="comp_parent" class="comp_parent">

                    <div id="comp_child" class="comp_child">
                    </div>
                </div>
            </div>

        </div>


        <div id="right_contents">

            <!-- 入力フォーム -->
            <h3>Tasks</h3>
            <div class="rightTask">
                <div class="right-task-regi">
                    <input type="date" name="date" min="2022-03" class="date" id="date">
                    <input type="text" id="task" placeholder="例）ジムに行く">
                    <!-- <input type="button" value="✔︎" id="button1"><br> -->
                    <button id="button1">登録</button><br>
                </div>

                <!-- DBに登録したタスク表示 -->
                <div id="parent" class="parent">
                    <div id="child" class="child"></div>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/ja.js"></script>
<script>
    //登録ボタンが押されたときの処理
    //input要素内のvalueをDBに送信し保存＞保存した内容を表示させる(POST)
    $(function() {
        $("#button1").click(function() {

            //テキストボックスの内容を取得
            let element = document.getElementById('task');
            let element1 = document.getElementById('date');
            var json1 = {
                "task": element.value, //タスクの値
                "date": element1.value //デッドラインの値
            };

            //入力完了後クリアにする
            element.value='';
            element1.value='';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "task.php", //アクセスするURLかディレクトリ
                type: "post", //POSTかGet
                contentType: "application/json",
                data: JSON.stringify(json1), //アクセスする時に必要なデータを記載
                dataType: "json", //データタイプの指定
            }).done(function(data1, textStatus, jqXHR) { //通信が成功した時の処理
                $("#p1").text(jqXHR.status); //例：200
                console.log(data1);
                console.log(data1['task'][0]['task']); //1
                console.log(data1['task'][0]['deadline']); //1

                // 配列の中身分解＞要素数の数だけHTML生成
                for (let i = data1['task'].length - 1; i < data1['task'].length; i++) {
                    var child = document.createElement("div");
                    var task = data1['task'][i]['task'];
                    var task_id = data1['task'][i]['id'];
                    var deadline = data1['task'][i]['deadline'];
                    var before_date = moment(deadline, 'YYYY-MM-DD');
                    var after_date = before_date.format('YYYY/MM/DD')
                    if (deadline == null) {
                        after_date = '期限なし';
                    }
                    addChild(child, task, task_id, i, after_date);
                }
                
                selectTask();

            }).fail(function(jqXHR, textStatus, errorThrown) { //通信が失敗した時の処理
                $("#p1").text("err:" + jqXHR.status); //例：404
                $("#p2").text(textStatus); //例：error
                $("#p3").text(errorThrown); //例：NOT FOUND
            }).always(function() {}); //通信の成否に関わらず実行する処理
        });
    });

    //最初に
    async function selectTask() {
        const res = await fetch('task.php');
        const json = await res.json();
        console.log(json);
        console.log(json['task'][0]['task']);
        var num = json['task'].length;

        $("div").remove(".taskChild");

        //配列の中身分解＞要素数の数だけHTML生成
        for (let i = 0; i < json['task'].length; i++) {
            var child = document.createElement("div");
            var task = json['task'][i]['task'];
            var task_id = json['task'][i]['id'];
            var deadline = json['task'][i]['deadline'];
            var before_date = moment(deadline, 'YYYY-MM-DD');
            var after_date = before_date.format('YYYY/MM/DD');
            if (deadline == null) {
                after_date = '期限なし';
            }
            addChild(child, task, task_id, i, after_date);
        }
        await checkTask(num);

    }
    selectTask();

    async function compSelTask() {
        const res = await fetch('completeView.php');
        const json = await res.json();
        console.log(json);
        console.log(json['task'][0]['task']);

        //配列の中身分解＞要素数の数だけHTML生成
        for (let i = 0; i < json['task'].length; i++) {
            var child = document.createElement("div");
            var task = json['task'][i]['task'];
            var task_id = json['task'][i]['id'];
            comp_addChild(child, task, task_id, i);
        }
        //一旦要素全削除
        $("div").remove(".taskChild");
        selectTask();


    }
    compSelTask();

    var parent = document.getElementById("parent");
    var comp_parent = document.getElementById("comp_parent");

    //子要素を追加
    function addChild(child, task, task_id, i, deadline) {
        child.innerHTML = "<div class='taskChild'><input type='checkbox' name='options'  class='taskCheck' data-value=" + task_id + " id=" + i + " onclick='checkClick() '><span class='dead' data-value=" + task_id + " id='dead" + i + "'> " + deadline + " </span><span class='taskval' data-value=" + task + "> " + task + " </span><span class='upddel'><a class='upd fa-solid fa-pen' id=" + i + " data-value=" + task_id + " data-val=" + task + "  onclick='updClick()'></a><a class='del fa-solid fa-trash-can'  id=" + i + " data-value=" + task_id + " onclick='delClick()'></a></span></div>";
        child = parent.appendChild(child);

    }

    function comp_addChild(child, task, task_id, i) {
        child.innerHTML = "<div class='compChild'>" + task + "</div>";
        child = comp_parent.appendChild(child);
    }

    //削除クリック時
    //削除処理の記述
    function delClick(e) {

        var e = e || window.event;
        var elem = e.target || e.srcElement;
        var element = elem.id;

        const data = $('#' + element).data('value');

        // console.log(element[this].getAttribute("data-value"));
        console.log(element);
        if (!confirm('本当に削除しますか？')) {
            //キャンセル時の処理
            return false;
        } else {
            //テキストボックスの内容を取得
            var json1 = {
                "del": data //値を取得
            };
            console.log(json1);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "del.php", //アクセスするURLかディレクトリ
                type: "post", //POSTかGet
                contentType: "application/json",
                data: JSON.stringify(json1), //アクセスする時に必要なデータを記載
                dataType: "json", //データタイプの指定
            }).done(function(data1, textStatus, jqXHR) { //通信が成功した時の処理
                // $("#p1").text(jqXHR.status); //例：200
                console.log("ここから削除後に受け取ったデータ");
                console.log(data1);

                    $("div").remove(".taskChild");
                    selectTask();
                
                

            }).fail(function(jqXHR, textStatus, errorThrown) { //通信が失敗した時の処理
                //エラーページに遷移でも良いかも、、、。
                // $("div").remove(".taskChild");
               

            }).always(function() {}); //通信の成否に関わらず実行する処理
            
        }
    }



    //編集クリック
    function updClick(e) {
        var input = '';

        //id値を元にvalue取得
        var e = e || window.event;
        var elem = e.target || e.srcElement;
        var element = elem.id;

        const data = $('#' + element).data('value'); //タスクのID
        var taskvalue = $('#' + element).data('val'); //タスク内容



        input = prompt("変更内容入力してください", taskvalue);
        console.log(input);

        if (input == null) {
            console.log("キャンセルが押されました");
            //キャンセル時の処理
            return false;
        } else {
            console.log("OKが押されました");
            //OK時の処理
            var json1 = {
                "upd": data, //値を取得
                "data": input
            };
            console.log(json1);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "upd.php", //アクセスするURLかディレクトリ
                type: "post", //POSTかGet
                contentType: "application/json",
                data: JSON.stringify(json1), //アクセスする時に必要なデータを記載
                dataType: "json", //データタイプの指定
            }).done(function(data1, textStatus, jqXHR) { //通信が成功した時の処理
                $("#p1").text(jqXHR.status); //例：200
                console.log("ここから編集後に受け取ったデータ");
                console.log(data1);
                console.log(data1['task'][0]['task']); //1

                //一旦要素全削除
                $("div").remove(".taskChild");

                selectTask();
                // // 配列の中身分解＞要素数の数だけHTML生成
                // for (let i = 0; i < data1['task'].length; i++) {
                //     var child = document.createElement("div");
                //     var task = data1['task'][i]['task'];
                //     var task_id = data1['task'][i]['id'];
                //     var deadline = data1['task'][i]['deadline'];
                //     var before_date = moment(deadline, 'YYYY-MM-DD');
                //     var after_date = before_date.format('YYYY/MM/DD');
                //     if (deadline == null) {
                //         after_date = '期限なし';
                //     }
                //     addChild(child, task, task_id, i, after_date);
                // }

            }).fail(function(jqXHR, textStatus, errorThrown) { //通信が失敗した時の処理
                //エラーページに遷移でも良いかも、、、。

            }).always(function() {}); //通信の成否に関わらず実行する処理
        }
    }

    function checkClick(e) {
        if (!confirm('本当にタスク完了しましたか？')) {
            //キャンセル時の処理
            //取り消し線つけたり外したりする処理
            let checks = document.getElementsByName('options');
            for (let i = 0; i < checks.length; i++) {
                if(checks[i].checked){
                    checks[i].checked=false;
                }
            }
            return false;
        } else {


            var e = e || window.event;
            var elem = e.target || e.srcElement;
            var element = elem.id;

            let parent = $('#' + element).parent();

            var taskId = $('#' + element).data('value'); //タスクのID

            console.log("親要素");
            console.log(parent);
            console.log("タスクID");
            console.log(taskId);
            console.log(document.getElementById(element));

            //取り消し線つけたり外したりする処理
            let checks = document.getElementsByName('options');
            console.log(checks);
            for (let i = 0; i < checks.length; i++) {
                if (checks[i].checked) {
                    $(parent).addClass('active');
                    //タスクIDを元にチェックのついたタスクにはcomplete_flgを付与する
                    var json1 = {
                        "taskId": taskId, //値を取得
                    };
                    console.log(json1);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "comp.php", //アクセスするURLかディレクトリ
                        type: "post", //POSTかGet
                        contentType: "application/json",
                        data: JSON.stringify(json1), //アクセスする時に必要なデータを記載
                        dataType: "json", //データタイプの指定
                    }).done(function(data1, textStatus, jqXHR) { //通信が成功した時の処理


                        //一旦要素全削除
                        $("div").remove(".taskChild");

                        //一旦要素全削除
                        $("div").remove(".compChild");
                        compSelTask();

                        // 配列の中身分解＞要素数の数だけHTML生成
                        for (let i = 0; i < data1['task'].length; i++) {
                            var child = document.createElement("div");
                            var task = data1['task'][i]['task'];
                            var task_id = data1['task'][i]['id'];
                            addChild(child, task, task_id, i);
                        }

                    }).fail(function(jqXHR, textStatus, errorThrown) { //通信が失敗した時の処理
                        //エラーページに遷移でも良いかも、、、。

                    }).always(function() {}); //通信の成否に関わらず実行する処理



                    return;
                    // console.log(checks[i].value);

                } else {
                    $('.taskChild').removeClass('active');
                }
            }


        }
    }

    //未達かどうか判断するための処理
    function checkTask(num) {
        //本日の日付取得
        var checkDate = new Date();
        var year = checkDate.getFullYear();
        var month = (checkDate.getMonth() + 1);
        var day = checkDate.getDate();
        console.log(year);
        console.log(month);
        console.log(day);
        var now = year + '-' + month + '-' + day;
        console.log(now);



        //タスクの日付取得
        console.log(num);
        for (var i = 0; i < num; i++) {
            let dead = document.getElementById('dead' + i);
            console.log(dead);

            // console.log(dead);
            console.log('deadline:' + dead.textContent);
            var before_date = moment(dead.textContent, 'YYYY/MM/DD');
            var after_year = before_date.format('YYYY');
            var after_month = before_date.format('MM');
            var after_day = before_date.format('DD');

            //タスク登録期日と、現在の日付を比較
            var year_result = year - after_year;
            console.log(year_result);

            var month_result = month - after_month;
            console.log(month_result);

            var day_result = day - after_day;
            console.log(day_result);

            //セーフな条件のみ列挙
            if (year_result <= 0) {
                if (month_result <= 0 || month_result == NaN) {
                    if (month_result == 0 && day_result >= 1) {
                        //アウト
                        dead.classList.add("fail");
                        // fail();

                    } else if (day_result <= 0) {}
                } else {
                    //アウト
                    dead.classList.add("fail");
                    // fail();
                }
            } else {
                //アウトの処理
                //背景赤色にするクラス付与&fail_flgに１をプラス
                dead.classList.add("fail");
                // fail();

            }

            if (isNaN(year_result) || isNaN(month_result) || isNaN(day_result)) {
                dead.classList.remove("fail");

            }



        }
    }
</script>


</html>