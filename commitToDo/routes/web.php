<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//トップページへ遷移
Route::get('/', function () {
    return view('index');
});

//サインイン画面へ遷移
Route::get('/signIn.php',function (){
    return view('signIn');
});
//サインイン実行時の遷移
Route::post('/signIn.php','App\Http\Controllers\SignInController@signIn');
Route::get('/sign.php','App\Http\Controllers\SignInController@sign' );


/* ユーザー新規作成時のルーティング */
//ユーザー新規作成画面へ遷移
Route::get('/newUser.php',function (){
    return view('newUser');
});

//newUser.phpからPOST値が来た時
Route::post('/checkUser.php','App\Http\Controllers\CheckUserController@checkUser');
Route::get('/checkUser.php','App\Http\Controllers\CheckUserController@get');

//checkUserからPOST
Route::post('/registerUser.php','App\Http\Controllers\RegisterUserController@registerUser');
Route::get('/registerUser.php','App\Http\Controllers\RegisterUserController@get');


/*  パスワード忘れた時のルーティング  */
//ユーザー名覚えてますか？画面へ遷移
Route::get('/userName.php',function (){
    return view('userName');
});

//ユーザー名入力後の画面遷移
Route::post('/seacretQ.php','App\Http\Controllers\SeacretQController@seacretQ');
Route::get('/seacretQ.php','App\Http\Controllers\SeacretQController@getQ');

//秘密の質問解答後の画面遷移
Route::post('/changePassword.php','App\Http\Controllers\ChangePasswordController@changePassword');
Route::get('/changePassword.php','App\Http\Controllers\ChangePasswordController@get');

//変更するパスワードが送られた時の遷移
Route::post('/finPassword.php','App\Http\Controllers\FinPasswordController@finPassword');
Route::get('/finPassword.php','App\Http\Controllers\FinPasswordController@get');

/*   ---  サインイン後のルーティング  ---   */
Route::get('/step1Goal.php','App\Http\Controllers\Step1GoalController@checkUser');
// Route::post('/step1Goal.php','App\Http\Controllers\Step1GoalController@insertTask');
Route::get('/task.php','App\Http\Controllers\TasksAjaxController@selectTask');
Route::post('/task.php','App\Http\Controllers\TasksAjaxController@insertTask');

//step1入力後の遷移
Route::post('/step2Goal.php','App\Http\Controllers\Step2GoalController@registerGoal');
Route::get('/step2Goal.php','App\Http\Controllers\Step2GoalController@get');
//理由入力時の非同期処理
Route::post('/addReason.php','App\Http\Controllers\ReasonAjaxController@addReason');

//step2入力後の遷移
Route::post('/step3Goal.php','App\Http\Controllers\Step3GoalController@registerReason');
Route::get('/step3Goal.php','App\Http\Controllers\Step3GoalController@get');

//step2入力後の遷移
Route::post('/finGoal.php','App\Http\Controllers\FinGoalController@registerImageUp');
Route::get('/finGoal.php','App\Http\Controllers\FinGoalController@get');

//Goal設定が終わっていてタスク管理画面に遷移する時
Route::get('/taskManagement.php','App\Http\Controllers\TaskManagementController@taskView');
Route::post('/taskManagement.php','App\Http\Controllers\TaskManagementController@getTask');
// Route::post('/taskManagement.php','App\Http\Controllers\TaskManagementController@postTask');

//タスク管理画面からチャット画面へ
Route::get('/chat.php','App\Http\Controllers\ChatController@chatAll');

//タスク管理画面からユーザー名変更画面へ
Route::get('/userNameUpdate.php','App\Http\Controllers\UserNameUpdateController@userNameUpdate');
Route::post('/updUserName.php','App\Http\Controllers\UserNameUpdateController@upd');

//タスク管理画面からMyGoal設定画面へ
Route::get('/myGoal.php','App\Http\Controllers\MyGoalController@myGoal');
Route::post('/myGoalUpd.php','App\Http\Controllers\MyGoalController@myGoalUpd');

Route::get('/signOut.php',function(){
    return view('pages.signOut');
});

Route::get('/admin.php','App\Http\Controllers\AdminController@admin');

//削除クリック時
Route::post('/del.php','App\Http\Controllers\TasksAjaxController@del');
//編集クリック時
Route::post('/upd.php','App\Http\Controllers\TasksAjaxController@upd');
//タスク完了時
Route::post('/comp.php','App\Http\Controllers\TasksAjaxController@comp');
Route::get('/completeView.php','App\Http\Controllers\TasksAjaxController@completeView');
Route::get('/adminCompleteView.php','App\Http\Controllers\TasksAjaxController@adminCompleteView');
Route::get('/adminCompCheck.php','App\Http\Controllers\AdminController@adminComp');

//チャット送信時
Route::post('/chatContents.php','App\Http\Controllers\ChatsAjaxController@chatsPost');
Route::post('/adminChatContents.php','App\Http\Controllers\ChatsAjaxController@adminChatsPost');
Route::get('/selectChat.php','App\Http\Controllers\ChatsAjaxController@selectChat');
Route::get('/adminChat.php','App\Http\Controllers\ChatsAjaxController@adminChat');

//adminページでユーザー取得
Route::get('/selectUser.php','App\Http\Controllers\AdminController@selectUser');
Route::post('/admin_del.php','App\Http\Controllers\AdminController@delUser');
Route::get('/admin_chat.php','App\Http\Controllers\AdminController@chat');

