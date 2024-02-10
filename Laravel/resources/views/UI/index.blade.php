@extends('UI.Layout.main')
@section('content-data')
<div class="container">
    <h1>hello index</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>mobile</th>
                <th>city</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @php $s=1 @endphp
            @foreach($data as $row)
            <tr>
                <td>{{ $s++}}</td>
                <td>{{ $row->title}}</td>
                <td>mobile</td>
                <td>city</td>
                <td>action</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop