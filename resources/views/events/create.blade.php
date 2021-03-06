@extends('layouts.header')
@section('title', 'イベント新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <table>
                <tr>
                    <th class="col-md-3">日付</th>
                    <td class="col-md-8">
                        <input type="date" class="form-control" name="date" rows="7">{{ old('date') }}
                    </td>
                </tr>
                <tr>
                    <th class="col-md-3">イベント名</th>
                    <td class="col-md-8">
                    <input type="text" class="form-control" name="title" rows="7">{{ old('title') }}
                </td>
                </tr>
                <tr>
                    <th class="col-md-3">イベント詳細</th>
                    <td class="col-md-8">
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
        </div>
    </div>
@endsection