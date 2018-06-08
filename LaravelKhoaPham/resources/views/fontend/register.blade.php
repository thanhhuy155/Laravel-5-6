@extends('layouts.default')
@section('title','Register')
@section('content')
    @if (count($errors)>0)
        <div class="alert alert-danger">
            Thong tin dang ky khong day du, ban can chih sua nhu sua
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (isset($message))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif
    {!! Form::open(array('url'=> '/register','class'=>'form-horizontal')) !!}
        <div class="form-group">
            {!! Form::label('name', 'Full Name', array('class' => 'col-sm-3 control-label')) !!}
            <div class="col-sm-9">
                {!! Form::text('name', '', array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email Address', array('class'=> 'col-sm-3 control-label')) !!}
            <div class="col-sm-9">
                {!! Form::email('email', '', array('class'=> 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) !!}
            <div class="col-sm-9">
                {!! Form::password('password', array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password', array('class'=> 'col-sm-3 control-label')) !!}
            <div class="col-sm-9">
                {!! Form::password('password_confirmation', array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('website', 'Website', array('class' => 'col-sm-3 control-label')) !!}
            <div class="col-sm-9">
                {!! Form::text('website', '', array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                {!! Form::submit('Submit', array('class' => 'btn btn-success')) !!}
            </div>
        </div>

   {!! Form::close() !!}
@endsection

