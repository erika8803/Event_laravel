@extends('layouts.header')
@section('title', 'イベント新規作成')

@section('content')
    <div class="container">
        <div class="col-md-10 mx-auto">
            <div class="">
                <p>イベント登録</p>
            </div>
  
            <form action="{{ action('EventsController@create') }}" method="post">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
                <table>
                    <tr>
                        <th class="">日付</th>
                        <td class="">
                            <input type="date" class="form-control" name="date" rows="7">{{ old('date') }}
                        </td>
                    </tr>
                    <tr>
                        <th class="">イベント名</th>
                        <td class="">
                        <input type="text" class="form-control" name="title" rows="7">{{ old('title') }}
                    </td>
                    </tr>
                    <tr>
                        <th class="">イベント詳細</th>
                        <td class="">
                            <textarea class="form-control" name="comment" rows="7">{{ old('comment') }}</textarea>
                        </td>
                    </tr>
                    <!-- <tr>
                        <th class="col-md-3">グループ</th>
                        <td class="col-md-8">
                            <select name="group">
                                <option value="">---選択---</option>
                                <option value="1">tedokon</option>
                                <option value="2">◯◯◯◯◯◯</option>
                                <option value="3">◯◯◯◯◯◯</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-md-3">画像</th>
                        <td class="col-md-8">
                            <input type="file" class="form-control-file" name="image_path">{{ old('image_path') }}
                        </td>
                    </tr> -->
                </tabel>
                {{ csrf_field() }}
                <input type="hidden" class="form-control-file" name="group" value="1">
                <input type="hidden" class="form-control-file" name="user_id" value="{{ $user_id }}">
                <div class="col-md-8">
                    <button>登録</button>
                </div>
            </form>
        </div>
    </div>
@endsection



