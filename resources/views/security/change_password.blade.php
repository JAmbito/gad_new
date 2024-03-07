@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="main-cont">
            <div class="middle-cont">
                <div class="middle-header">
                    <div class="text-header-div mb-0">
                        <span>Change password</span>
                    </div>
                </div>

                <div class="middle-form-cont">
                    <span>We have noticed that you haven't changed your default password yet. As part of our security measures, please assign a new password.</span>
                    <form method="POST" action="{{ route('security.change_password.update') }}">
                        @csrf
                        <div class="status-cont" style="text-align: left; display: flex;">
                        </div>
                        <br/>
                        <div class="input-cont">
                            <i class="fa-solid fa-lock"></i>
                            <i class="fa-regular fa-eye show-pass"></i>
                            <i class="fa-regular fa-eye-slash hide-pass"></i>
                            <input type="password" name="password" class="password-input" placeholder="New password" required autocomplete="off">
                        </div>

                        <div class="input-cont">
                            <i class="fa-solid fa-lock"></i>
                            <i class="fa-regular fa-eye show-pass"></i>
                            <i class="fa-regular fa-eye-slash hide-pass"></i>
                            <input type="password" name="confirm" class="password-input" placeholder="Confirm new password" required autocomplete="off">
                        </div>
                        <div class="input-cont">
                            <a href="{{ route('dashboard') }}" class="btn btn-default mt-15 align-self-center">Maybe later</a>
                            <button class="login-btn align-self-center ml-15" type="submit">Change password</button>
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
