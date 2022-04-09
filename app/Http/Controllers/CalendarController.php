<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\Auth; 
use App\Event;


class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $today = date('Y-m-d');

        // form に入力された値を取得
        $form = $request->all();

        if( isset($form['yearMonth'])) {
            $yearMonth = $form['yearMonth'];

        } else {
            $yearMonth = date('Y-m');
        }
        
        // 先月・翌月が押された時の処理
        if( isset( $form['lastMonth'] )) {
            $yearMonth = date('Y-m', strtotime (' -1 month', strtotime($yearMonth)));
        }

        if( isset( $form['nextMonth'] )) {
            $yearMonth = date('Y-m', strtotime (' +1 month', strtotime($yearMonth)));
        }

        // カレンダー作成
        $calendar = [];
        $displayNum = 0;

        $firstDay = date('Y-m-j', strtotime($yearMonth));
        $lastDay = date('d', strtotime('last day of this month',  strtotime($yearMonth)));
        $weekNumFirstDay = date('w', strtotime($firstDay));
        $weekNumLastDay = date('w', strtotime($yearMonth . '-' . $lastDay));

        for ($dayLoop = 1; $dayLoop <= $lastDay; $dayLoop++) {
            // 週の始まりが日曜じゃない場合、配列に空を入れる
            if( 1 == $dayLoop ) {
                for( $firstWeekLoop = 0; $firstWeekLoop <= $weekNumFirstDay ; $firstWeekLoop++ ) {
                    $calendar[$displayNum]['day'] = '';
                    $displayNum++;
                }
            }
            $calendar[$displayNum]['day'] = $dayLoop;
            $displayNum++;
            
            // 週の終わりが土曜じゃない場合、配列に空を入れる
            if( $lastDay == $dayLoop ) {
                for( $lastWeekLoop = 0; $lastWeekLoop <= $weekNumLastDay; $lastWeekLoop++ ) {
                    $calendar[$displayNum]['day'] = '';
                    $displayNum++;
                }
            }
        }

        return view('calendar.index', [
            'yearMonth' => $yearMonth,
            'calendar' => $calendar,
        ]);

    }
}
