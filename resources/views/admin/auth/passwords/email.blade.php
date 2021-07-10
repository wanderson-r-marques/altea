@extends('admin.layouts.login_layout')
@section('content') 
<!-- BEGIN LOGIN -->
<div class="content"> 
    <!-- BEGIN FORGOT PASSWORD FORM --> 
    @if (session('status'))
    <div class="note note-info">
        <h4 class="block">{{__('Email Sent!')}}</h4>
        <p> {{__('An email with password reset link has been sent to your provided email address.')}}' </p>
    </div>
    @else
    <form class="form-horizontal forget-form" role="form" method="POST" action="{{ route('admin.password.email') }}" style="display:block;">
        {{ csrf_field() }}
        <h3 class="font-green">{{__('Forgot Password?')}}</h3>
        <p> {{__('Enter your e-mail address below to reset your password.')}} </p>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> {{__('Enter Email please.')}} </span> </div>
        @if ($errors->has('email'))
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span>{{ $errors->first('email') }}</span> </div>
        @endif
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">{{__('Email Address')}}</label>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="{{__('Email Address')}}" name="email" value="{{old('email')}}" />
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase pull-right">{{__('Send Password Reset Link')}}</button>
        </div>
    </form>
    @endif 
    <!-- END FORGOT PASSWORD FORM --> 
</div>
@endsection