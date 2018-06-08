@extends('layouts.default')
@section('title', 'Vi du dau tien ve Blade template')
@section('sidebar')
    @parent
        <p>Phan 2 cuar sidebar</p>
@endsection
@section('content')
    <p>Phan noi dung chinh cua trang o day</p>
    @endsection
