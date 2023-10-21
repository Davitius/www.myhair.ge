@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center vh-100 d-flex align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-headeri">{{ __('local.პაროლის განახლება / შეცვლა') }}</div>

                <div class="card-bodyy">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
{{--                            {{ session('status') }}--}}
                            {{__('local.თქვენს ელ. ფოსტაზე გაიგზავნა პაროლის შეცვლა / აღდგენის ლინკი.')}}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('local.ელ. ფოსტა') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('local.პაროლის გადატვირთვის ლინკის გაგზავნა') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
