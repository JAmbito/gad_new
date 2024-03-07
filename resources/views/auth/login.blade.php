@extends('layouts.app')

@section('content')

<section id="content">
    <div class="main-cont">
        <div class="middle-cont">

            <div class="middle-header">
                <div class="text-header-div">
                    <strong class="subtitle">Bataan Peninsula State University</strong>
                    <br/>
                    <span>Gender and Development</span>
                </div>
                <div class="img-header-div">
                    <img src="{{ asset('gad/img/log123.png') }}">
                </div>
            </div>

            <div class="middle-form-cont">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="status-cont" style="text-align: left; display: flex;">
                    </div>

                    <div class="input-cont">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="email"  placeholder="Username" required>
                    </div>
                    <div class="input-cont">
                        <i class="fa-solid fa-lock"></i>
                        <i class="fa-regular fa-eye show-pass"></i>
                        <i class="fa-regular fa-eye-slash hide-pass"></i>
                        <input type="password" class="password-input" name="password" placeholder="Password" required autocomplete="off">
                    </div>
                    <div class="input-cont">
                        <button class="login-btn" type="submit">LOGIN</button>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                </form>
            </div>

        </div>

    </div>

</section>
@endsection
