@extends('layouts.page')

@section('title', 'User settings')

@section('content_header')
    <h1>User settings</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="@include('components.gravatar_url', ['email' => Auth::user()->email ])" alt="User profile picture">
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                    <p class="text-muted text-center">{{ Auth::user()->email }}</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Member since</b> <a class="pull-right">{{ Auth::user()->created_at->format('F Y') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Machines</b> <a class="pull-right">{{ Auth::user()->machines()->count() }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-8">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Notification services</h3>
                </div>

                <div class="box-body">
                    {{ Form::model(Auth::user(), ['route' => 'user.save', 'method' => 'POST']) }}
                    <h3 class="box-title">Pushover</h3>
                    <div class="form-group">
                        {{ Form::label('pushover_user_key', 'User key') }}
                        {{ Form::text('pushover_user_key', null, array('class' => 'form-control', 'placeholder' => 'Your user key')) }}
                        <span class="help-block">Your user key can be found when logged in at <a href="https://pushover.net/" target="_blank">pushover.net</a>.</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('pushover_app_key', 'App key') }}
                        {{ Form::text('pushover_app_key', null, ['class' => 'form-control', 'placeholder' => 'Your app key']) }}
                        <span class="help-block">The app token is available after you have created a <a href="https://pushover.net/apps" target="_blank">Pushover app</a>.</span>
                    </div>

                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop