@extends('layouts.header')
@section('title', 'イベント新規作成')

@section('content')
    <div class="container">
        <div class="">
            <p>イベント一覧</p>
        </div>
        <div>
            <table border='1'>
                <tr>
                    <th class="col-md-3">日付</th>
                    <th class="col-md-3">イベント名</th>
                    <th class="col-md-3">イベント詳細</th>
                </tr>
                @foreach($events as $key => $event)
                <tr>
                    <td>
                        {{ $event->date }}
                    </td>
                    <td>
                        <a href="{{ action('EventsController@update', ['id' => $event->id]) }}">
                            {{ $event->title }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ action('EventsController@update', ['id' => $event->id]) }}">
                        {{ $event->comment }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tabel>
        </div>
    </div>
@endsection
