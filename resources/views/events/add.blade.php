@extends('layouts.header')
@section('title', 'イベント新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ action('EventsController@add') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    <!-- エラーがあった場合エラーを表示 -->
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <h4>イベント新規作成</h4>

                    <table>
                        <tr>
                            @foreach($user as $key => $users)
                                <input type="hidden" name="user_id" value="{{ $users }}">
                            @endforeach
                        </tr>
                        <tr>
                            <th class="col-md-3" for="date">
                                日付
                            </th>
                            <td class="col-md-8">
                                <input type="date" class="form-control" name="date" rows="7">{{ old('date') }}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3" for="title">
                                タイトル
                            </th>
                            <td class="col-md-8">
                                <input type="text" class="form-control" name="title" rows="7">{{ old('title') }}
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3" for="comment">
                                コメント
                            </th>
                            <td class="col-md-8">
                                <textarea class="form-control" name="comment" rows="7">{{ old('comment') }}</textarea>
                            </td>
                        </tr>
                        <!-- <tr>
                            <th class="col-md-3" for="group">
                                グループ
                            </th>
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
                            <th class="col-md-3" for="picture">
                                画像
                            </th>
                            <td class="col-md-8">
                                <input type="file" class="form-control-file" name="image_path">{{ old('image_path') }}
                            </td>
                        </tr> -->
                        {{ csrf_field() }}
                        <tr>
                            <th class="col-md-3" for="">
                            </th>
                            <td class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="確認画面">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection



