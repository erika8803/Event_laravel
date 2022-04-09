<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\Auth;
use App\Event;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $events = Event::orderBy('date', 'DESC')->get();
        return view('events.index', ['events' => $events ]);
    }

    public function add()
    {
        $user_id = Auth::id();

        return view('events.add', ['user_id' => $user_id ]);
    }

    public function create(Request $request)
    {

        // Varidationを行う
        $this->validate($request, Event::$rules);

        // form に入力された値を取得
        $form = $request->all();

        $events = new Event;
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $events->fill($form);
        $events->save();

        return redirect('events');
    }

}
