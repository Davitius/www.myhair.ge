@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <section class="auth-wrapper">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h2 class="auth-section-title">{{__('local.ავტორიზაცია')}}</h2>
                            <p class="auth-section-subtitle">{{__('local.პირად კაბინეტში შესასვლელად გაიარეთ ავტორიზაცია.')}}</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">{{__('local.ელ. ფოსტა')}} <sup>*</sup></label>
{{--                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email *">--}}
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{__('local.ელ. ფოსტა')}} *" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{__('local.პაროლი')}} <sup>*</sup></label>
{{--                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password *">--}}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{__('local.პაროლი')}} *" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-actions-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="keepLogin">
                                        <label class="form-check-label" for="keepLogin">
                                            {{__('local.დამიმახსოვრე')}}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-password-link">{{__('local.დაგავიწყდა პაროლი?')}}</a>
                                    @endif
                                </div>
                                <button class="btn btn-primary btn-auth-submit" type="submit">{{__('local.ავტორიზაცია')}}</button>
                            </form>
                            <p class="mb-0">
                                <a href="{{ route('MainRegister', 'r')}}" class="text-dark font-weight-bold">{{__('local.ახალი მომხმარებელი ხარ? დარეგისტრირდი.')}}</a>
                            </p>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <img src="{{asset('assets/images/login.png')}}" alt="login" class="img-fluid">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
