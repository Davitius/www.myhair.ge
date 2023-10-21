
@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center vh-100 d-flex align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-headeri">{{ __('დაადასტურეთ თქვენი ელფოსტის მისამართი') }}</div>

                    <div class="card-bodyy">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('თქვენს ელ. ფოსტის მისამართზე გაიგზავნა ახალი დამადასტურებელი ბმული.') }}
                            </div>
                        @endif

                        {{ __('გთხოვთ, შეამოწმოთ თქვენი ელფოსტა დამადასტურებელი ბმულისთვის.') }}
                        <br>
                        {{ __('თუ არ მიგიღიათ ელფოსტა') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link-dark">{{ __('ხელახლა გაგზავნა') }}</button>.
                        </form>
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col-md-8 -->
        </div><!-- row -->
    </div><!-- /.container -->
@endsection
