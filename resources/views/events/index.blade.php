@extends('layouts.header')
@section('title', 'イベント新規作成')

@section('content')
    <div class="container">
        <div class="col-md-10 mx-auto">
            <div class="">
                <p>イベント一覧</p>
            </div>
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th class="">日付</th>
                        <th class="">イベント名</th>
                        <th class="">イベント詳細</th>
                        <th class=""></th>
                    </tr>
                    @foreach($events as $key => $event)
                    <tr>
                        <td>
                            {{ $event->date }}
                        </td>
                        <td>
                            {{ $event->title }}
                        </td>
                        <td>
                            {{ $event->comment }}
                        </td>
                        <td>
                            <a href="{{ action('EventsController@update', ['id' => $event->id]) }}">
                                <button>変更</button>
                            </a>
                            <a href="{{ action('LineApiController@pushSend', ['id' => $event->id]) }}">
                                <button>LinePush</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                @if(session('message'))
                <div class="alert alert-info">{{session('message')}}</div>
                @endif
                </tabel>
            </div>
        </div>
    </div>
@endsection
