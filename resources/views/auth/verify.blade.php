@extends('template.master')
<title>Verify your email</title>
@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        {{ __('We sent an email to your account to verify your email address and activate your account. The link will expire in 24 hours.') }}
                        {{ __('If you did not receive the email, ') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection