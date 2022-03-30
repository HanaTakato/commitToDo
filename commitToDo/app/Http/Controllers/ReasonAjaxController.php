<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReasonAjaxController extends Controller
{
    //理由を登録して返却する
    public function addReason(Request $request)
    {

        $reason = $request->input('reason');

        $reason = htmlspecialchars($reason, ENT_QUOTES);
        // $data1 = ['reason1' => $reason];

        if (!(session()->has('reason1'))) {
            //受け取った理由をセッションに格納
            session(['reason1' => $reason]);
            $data1 = ['reason1' => $reason];
        } elseif ((session()->has('reason1')) && !(session()->has('reason2'))) {
            session(['reason2' => $reason]);
            $data1 = ['reason1' => session('reason1'), 'reason2' => $reason];
        } elseif ( (session()->has('reason1')) && (session()->has('reason2')) && !(session()->has('reason3'))) {
            session(['reason3' => $reason]);
            $data1 = ['reason1' => session('reason1'), 'reason2' => session('reason2'), 'reason3' => $reason];
        } else {
            // session()->forget('reason1');
            // session()->forget('reason2');
            // session()->forget('reason3');
        }

        return $data1;


        // return response()->json([
        //     'code' => '1',
        //     'name' => 'eigyou'
        //  ]);
    }
}
