<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>管理者用ページ</title>
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
    <div class="admin_title">
        <h1>こんにちは運営さん</h1>
    </div>

    <!-- チャット内容出力部分 -->
    <div class="admin_table">

        <table id="admin_parent" class="admin_parent">
            <tr>
                <th>ユーザー名</th>
                <th>チャット</th>
                <th>削除</th>
                <th>進捗確認</th>
            </tr>
            <div id="admin_child" class="admin_child"></div>

        </table>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //最初に
    async function selectUser() {
        const res = await fetch('selectUser.php');
        const json = await res.json();
        console.log(json);

        //一旦要素全削除
         $("tr").remove(".trRemove");
        $("td").remove(".adminAll");

        //配列の中身分解＞要素数の数だけHTML生成
        for (let i = 0; i < json['data'].length; i++) {
            var child = document.createElement("tr");
            var userName = json['data'][i]['name'];
            var userId = json['data'][i]['id'];
            addChild(child, userName, userId, i);
        }
        
        for (let i = 0; i < json['data'].length; i++) {
        let parent = document.getElementById('trR'+i).parentElement;
        console.log('親要素取れるかな？');
        console.log(parent);
        parent.classList.add('trRemove');
        }
        
        $("tr").remove(".trRemove");
        // $("td").remove(".adminAll");
        
        // //配列の中身分解＞要素数の数だけHTML生成
        for (let i = 0; i < json['data'].length; i++) {
            var child = document.createElement("tr");
            var userName = json['data'][i]['name'];
            var userId = json['data'][i]['id'];
            addChild(child, userName, userId, i);
        }
        for (let i = 0; i < json['data'].length; i++) {
        let parent = document.getElementById('trR'+i).parentElement;
        console.log('親要素取れるかな？');
        console.log(parent);
        parent.classList.add('trRemove');
        }
        

    }
    selectUser();

    var parent = document.getElementById("admin_parent");

    //子要素を追加
    function addChild(child, userName, userId, i) {
        child.innerHTML = "<td class='adminAll' id='trR"+i+"' >" + userName + "</td><td class='adminAll'><a href='admin_chat.php?id=" + userId + "' class='admin_chat' id=" + i + " '>参加</a></td><td class='adminAll'><a class='admin_del' id='del_user" + i + "' data-value=" + userId + " onclick='delClick()'>実行</a></td><td class='adminAll'><a href='adminCompCheck.php?checkCompId=" + userId + "' class='admin_comp' id=" + i + " '>確認</a></td>";
        child = parent.appendChild(child);
    }


    //削除実行クリック
    function delClick(e) {
        //クリックしたアンカータグのid値を元に、
        //data-valueであるuserId値を取得する処理

        var e = e || window.event;
        var elem = e.target || e.srcElement;
        var element = elem.id;

        var data = $('#' + element).data('value');


        console.log('elementの値');
        console.log(element);
        console.log('ユーザーID取れるかな？');
        console.log(data);
        
        // let parent = document.getElementById('trR1').parentElement;
        // console.log('親要素取れるかな？');
        // console.log(parent);
        // parent.classList.add('trRemove');

        // console.log(element[this].getAttribute("data-value"));
        console.log(element);
        if (!confirm('本当に削除しますか？')) {
            //キャンセル時の処理
            return false;
        } else {
            //テキストボックスの内容を取得
            var json1 = {
                "admin_del": data //値を取得
            };
            console.log(json1);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "admin_del.php", //アクセスするURLかディレクトリ
                type: "post", //POSTかGet
                contentType: "application/json",
                data: JSON.stringify(json1), //アクセスする時に必要なデータを記載
                dataType: "json", //データタイプの指定
            }).done(function(data1, textStatus, jqXHR) { //通信が成功した時の処理
                // $("#p1").text(jqXHR.status); //例：200
                console.log("ここから削除後に受け取ったデータ");
                console.log(data1);

                //一旦要素全削除
                // $("td").remove(".adminAll");

                //親要素を取得
                // let parent = document.getElementsByClassName('.adminAll').parentElement;
                // parent.classList.add('trRemove');
                
                

                selectUser();
                // 配列の中身分解＞要素数の数だけHTML生成
                // for (let i = 0; i < data1['data'].length; i++) {
                //     var child = document.createElement("tr");
                //     var userName = data1['data'][i]['name'];
                //     var userId = data1['data'][i]['id'];
                //     addChild(child, userName, userId, i);
                // }
                // $("#p2").text(JSON.stringify(data1));

            }).fail(function(jqXHR, textStatus, errorThrown) { //通信が失敗した時の処理
                // $("#p1").text("err:" + jqXHR.status); //例：404
                // $("#p2").text(textStatus); //例：error
                // $("#p3").text(errorThrown); //例：NOT FOUND
            }).always(function() {}); //通信の成否に関わらず実行する処理
        }
    }

    //サインアウトクリック
    function signOut() {
        if (!confirm('本当にサインアウトしますか？')) {
            //キャンセル時の処理
            return false;
        } else {
            location.href='signIn.php';

        }
    }
</script>

</html>