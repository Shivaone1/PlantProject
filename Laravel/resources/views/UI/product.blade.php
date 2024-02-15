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
            <!-- @php $s=1 @endphp -->
            @foreach ($products as $product)
            <p>{{ $product->name }} - Category: {{ $product->category->name }} - SubCategory: {{ $product->subCategory->name }} - Brand: {{ $product->brand->name }}</p>
            @endforeach
        </tbody>
    </table>
</div>
@stop
<?php
