@extends('layouts.app')

@section('content')

<?php
$campus = \App\Campus::get();
?>
<section id="content">
    <div class="main-cont">
        <div class="middle-cont">

            <div class="middle-header">
                <div class="text-header-div">
                    <span>GAD - BPSU - Test</span>
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
                        <select name="campus_id" id="campus_id" required>
                            <option value="">-SELECT CAMPUS-</option>
                            @foreach ($campus as $item)
                            <option value="{{$item->id}}">{{$item->campus_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-cont">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="email"  placeholder="Username" required>
                    </div>
                    <div class="input-cont">
                        <i class="fa-solid fa-lock"></i>
                        <i class="fa-regular fa-eye" id="show-pass-id"></i>
                        <i class="fa-regular fa-eye-slash" id="hide-pass-id"></i>
                        <input type="password" name="password" placeholder="Password" required autocomplete="off" id="password-id">
                    </div>
                    <div class="input-cont">
                        <button class="login-btn" type="submit">LOGIN</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</section>
@endsection
