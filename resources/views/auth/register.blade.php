@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <section class="auth-wrapper">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h2 class="auth-section-title">{{__('local.რეგისტრაცია')}}</h2>
                            <p class="auth-section-subtitle">{{__('local.შექმენი შენი პირადი ანგარიში.')}}</p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">{{__('local.სახელი')}} <sup>*</sup></label>
{{--                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">--}}
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{__('local.სახელი')}}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('local.ელ. ფოსტა')}} <sup>*</sup></label>
{{--                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">--}}
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{__('local.ელ. ფოსტა')}}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{__('local.პაროლი')}} <sup>*</sup></label>
{{--                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">--}}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{__('local.პაროლი')}}" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">{{__('local.დაადასტურე')}} {{__('local.პაროლი')}} <sup>*</sup></label>
{{--                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">--}}
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{__('local.დაადასტურე')}} {{__('local.პაროლი')}}" required autocomplete="new-password">
                                </div>
                                <button class="btn btn-primary btn-auth-submit" type="submit">{{__('local.რეგისტრაცია')}}</button>
                            </form>
                            <p class="mb-0">
                                <a href="{{ route('MainLogin', 'l')}}" class="text-dark font-weight-bold">{{__('local.გააქვს უკვე ანგარიში?')}} {{__('local.ავტორიზაცია')}}</a>
                            </p>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <img src="{{asset('assets/images/Register.png')}}" alt="login" class="img-fluid">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
