@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 m-auto">
                    <form class="form" method="POST" action="{{ route('user.store') }}">
                        @csrf

                        <div class="card card-login card-hidden mb-3">
                            <div class="card-header card-header-primary text-center">
                                <h4 class="card-title"><strong>{{ __('Add a new user') }}</strong></h4>
                            </div>
                            <div class="card-body ">
                                <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                                        </div>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <div id="name-error" class="error text-danger pl-3" for="name"
                                             style="display: block;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                                        </div>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <div id="email-error" class="error text-danger pl-3" for="email"
                                             style="display: block;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                                        </div>
                                        <input type="password" name="password" id="password" class="form-control"
                                               placeholder="{{ __('Password...') }}" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <div id="password-error" class="error text-danger pl-3" for="password"
                                             style="display: block;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="card-footer justify-content-center">
                                <button type="submit"
                                        class="btn btn-primary btn-link btn-lg">{{ __('Create account') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
