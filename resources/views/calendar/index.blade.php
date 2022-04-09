@extends('layouts.header')
@section('title', 'イベント新規作成')

@section('content')
    <div class="container">
        <div class="row">
            カレンダー
        </div>
        <form action="{{ action('CalendarController@index') }}" method="get">
            <input type="hidden" name="yearMonth" value={{ $yearMonth }}>
            <input type="submit" name="lastMonth" value="<<">
                {{ $yearMonth }}
            <input type="submit" name="nextMonth" value=">>">
        </form>    
        <table class="table table-bordered">
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            @foreach( $calendar as $key => $day)
            <tr>
                <td>{{ $day['day'] }}</td>
                @if( $key == '7')
                </tr>
                <tr>
                @endif
            @endforeach
            </tr>
        </table>
    </div>
@endsection
