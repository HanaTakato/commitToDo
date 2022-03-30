<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>ユーザー毎のタスク達成確認</title>
</head>
<body>
<header>
        <div class="g_nav2">
            <ul id="nav">
                <li><a href="admin.php"> CommitToDo</a></li>
                <span class="right_nav">
                    <li><a href="#" onclick="signOut()">サインアウト</a></li>
                </span>
            </ul>
        </div>
    </header>
    <a href="admin.php" class="adminChatArrow">←</a>

    <!-- タスクの達成、未達成確認 -->
    <div class="admin_task_complete">
                <h1>complete</h1>
                <div id="admin_comp_parent" class="admin_comp_parent">

                    <div id="admin_comp_child" class="admin_comp_child">
                    </div>
                </div>
            </div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/ja.js"></script>
<script>
    function signOut() {
        if (!confirm('本当にサインアウトしますか？')) {
            //キャンセル時の処理
            return false;
        } else {

            location.href='signIn.php';
        }
    }

    async function compSelTask() {
        const res = await fetch('adminCompleteView.php');
        const json = await res.json();
        console.log(json);

        //配列の中身分解＞要素数の数だけHTML生成
        for (let i = 0; i < json['task'].length; i++) {
            var child = document.createElement("div");
            var task = json['task'][i]['task'];
            var task_id = json['task'][i]['id'];
            var deadline = json['task'][i]['deadline'];
            var before_date = moment(deadline, 'YYYY-MM-DD');
                    var after_date = before_date.format('YYYY/MM/DD')
                    if (deadline == null) {
                        after_date = '期限なし';
                    }
            comp_addChild(child, task, task_id, i,after_date);
        }
        //一旦要素全削除
        // $("div").remove(".taskChild");
        // selectTask();


    }
    compSelTask();

    var comp_parent = document.getElementById("admin_comp_parent");

    function comp_addChild(child, task, task_id, i , deadline) {
        child.innerHTML = "<div class='adChi'><span class='admin_compChild_span'>"+ deadline +"</span><span class='admin_compChild'>" + task + "</span></div>";
        child = comp_parent.appendChild(child);
    }

</script>
</html>