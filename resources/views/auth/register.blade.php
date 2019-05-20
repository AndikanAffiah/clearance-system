@extends('layouts.app')

<style>
    body{
        background-image: url('images/300-sl-alternative-energy-blue-sky-371900.jpg');
    }
    .bg-ll-blue{
        background-color: #eeebff;
    }
</style>

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div id="whole" class="card-header" hidden>{{ __('Register') }}</div>

                <div class="card-body bg-ll-blue">

                    <div class="col-md-6 m-auto text-center" id="reg">
                        
                        <h5>REGISTRATION FORM</h5>
                        
                        <div class="border mb-3">
                        <label for="" class="h5">Register as a student</label> 
                            <input type="button" value="Sign up" name="user" onclick="showAndHide('user')" class="btn btn-outline-primary">
                        </div>
                            
                        <div class="border mb-3">
                        <label for="" class="h5">Register as admin</label>
                            <input type="button" value="Sign up" name="admin" onclick="showAndHide('admin')" class="btn btn-outline-primary">
                        </div>
                        
                    </div>

                    <form id="form" method="POST" action="{{ route('register') }}" hidden>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regno" class="col-md-4 col-form-label text-md-right">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="regno" type="text" class="form-control @error('regno') is-invalid @enderror" name="regno">

                                @error('regno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" hidden>
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                            <div class="col-md-6">
                                <input id="user_type" type="text" class="form-control @error('type') is-invalid @enderror" name="user_type">

                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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


<script>
    function showAndHide(type) { 
        document.getElementById('user_type').value = type;
        document.getElementById('form').hidden = false;
        document.getElementById('reg').hidden = true;
        document.getElementById('whole').hidden = false;
    }
</script>