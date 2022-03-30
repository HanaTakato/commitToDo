<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/32d866f0a8.js" crossorigin="anonymous"></script>
    <title>管理者-Chat-</title>
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

    <!-- チャット内容出力部分 -->
    <div id="chat_parent" class="chat_parent">
        <div id="chat_child" class="chat_child"></div>
    </div>
    </div>

    <div class="space"></div>

    <!-- チャット内容送信フォーム -->
    <div class="chat_form">
        <textarea id="chat_content"></textarea>
        <button id="chatButton"><span><i class="fa-solid fa-paper-plane"></i></span></button>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(function() {
        $("#chatButton").click(function() {
            let element = document.getElementById('chat_content');
            console.log(element);
            console.log(element.value);
            var json1 = {
                "chat_contents": element.value, //値を取得
            };
            element.value='';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "adminChatContents.php", //アクセスするURLかディレクトリ
                type: "post", //POSTかGet
                contentType: "application/json",
                data: JSON.stringify(json1), //アクセスする時に必要なデータを記載
                dataType: "json", //データタイプの指定
            }).done(function(data1, textStatus, jqXHR) { //通信が成功した時の処理
                console.log(data1);

                // 配列の中身分解＞要素数の数だけHTML生成
                for (let i = data1['chat'].length - 1; i < data1['chat'].length; i++) {
                    var child = document.createElement("div");
                    var chat = data1['chat'][i]['content'];
                    chat=chat.replace(/\n/g,'<br>');
                    var user_id = data1['chat'][i]['user_id'];
                    addChild(child, chat , user_id);
                }
                $("#p2").text(JSON.stringify(data1));

            }).fail(function(jqXHR, textStatus, errorThrown) { //通信が失敗した時の処理
    
            }).always(function() {}); //通信の成否に関わらず実行する処理
            

        });
    });

     //最初に
     async function selectChat() {
        const res = await fetch('adminChat.php');
        const json = await res.json();
        console.log(json);
        console.log(json['chat'][0]['content']);

        //配列の中身分解＞要素数の数だけHTML生成
        for (let i = 0; i < json['chat'].length; i++) {
            var child = document.createElement("div");
            var chat = json['chat'][i]['content'];
            // chat=chat.replace('&#13;','<br>');
            chat=chat.replace(/\n/g,'<br>');
            var user_id = json['chat'][i]['user_id'];
            addChild(child, chat , user_id);
        }

    }
    selectChat();

    var parent = document.getElementById("chat_parent");

    //子要素を追加
    function addChild(child, chat , user_id) {
        child.innerHTML = "<div class='chatChildAdmin user_id_"+ user_id +"' id='user"+user_id+"'>" + chat + "</div>";
        child = parent.appendChild(child);
    }

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