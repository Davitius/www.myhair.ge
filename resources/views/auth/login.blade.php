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
                                        <label class="form-check-label font-weight-normal" for="keepLogin">
                                            {{__('local.დამიმახსოვრე')}}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-password-link font-weight-normal">{{__('local.დაგავიწყდა პაროლი?')}}</a>
                                    @endif
                                </div>
                                <button class="btn btn-primary btn-auth-submit" type="submit">{{__('local.ავტორიზაცია')}}</button>
                            </form>
                            <p class="mb-0">
                                <a href="{{ route('MainRegister', 'r')}}" class="text-dark">{{__('local.ახალი მომხმარებელი ხარ? დარეგისტრირდი.')}}</a>
                            </p>
                            <div class="mx-auto mt-5 mb-5 w-100 d-flex justify-content-center align-items-center flex-column">
                                <p class="text-dark font-weight-bold mx-auto">ან გაიარე ავტორიზაცია</p>
                                <a href="{{route('googleRedirect')}}" class="btn btn-outline-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                    </svg>oogle ით
                                </a>
                            </div>

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
