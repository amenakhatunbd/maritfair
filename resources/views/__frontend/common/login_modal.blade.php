

<div class="modal fade loginModal regloginModal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create an account</h5>
                <button type="button" class="close login-full-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $authCheck = Auth::check();
                ?>
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::open(['url' => ['/register'], 'id' => 'registrationForm', 'class'=>'smAuthForm']) }}
                        <div class="form-group">
                            <label for="username" class="col-form-label">Your Name:</label>
                            {!! Form::text('username', null, ['class' => 'form-control', 'required', 'id'=>'username', 'placeholder'=> 'Your Name . . .']) !!}
                            <span class="error-notice"></span>
                        </div>
                        <div class="form-group">
                            <label for="emmail_login" class="col-form-label">Email address:</label>
                            {!! Form::email('email', null, ['class' => 'form-control', 'required', 'id'=>'emmail_login', 'placeholder'=> 'Email Address . . .']) !!}
                            <span class="error-notice"></span>
                        </div>
                        <div class="form-group">
                            <label for="password" minlength="6" class="col-form-label">Password: (Minimum 6 charecters)</label>
                            <input id="password" type="password" name="password" required
                                   class="form-control input-lg m-log"
                                   placeholder="Password">
                            <span class="error-notice"></span>

                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" minlength="6" class="col-form-label">Conform Password:</label>
                            <input id="password_confirmation" required name="password_confirmation" type="password"
                                   class="form-control"
                                   placeholder="Conform Password . . .">
                            <span class="error-notice"></span>

                        </div>
                       <!--  <div class="form-group">
                            <label for="g-recaptcha-response" class="col-form-label">Recaptcha:</label>
                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                            @endif
                            <span class="error-notice"></span>
                        </div> -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> Create an account
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6">
                        <form id="loginForm1" method="post" action="{{ url('/login') }}"
                              class="login-form-wraper smAuthHide smAuthForm {{ SM::current_controller()=="LoginController" && SM::current_method()=="index" ? ' active' : '' }}"
                              style="display: {{ !$authCheck && SM::current_controller()=="LoginController" && SM::current_method()=="index" ? 'block' : 'block' }}">
                            <?php
                            $isLoginController = SM::current_controller() == "LoginController" ? true : false;
                            ?>
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="emmail_login" class="col-form-label">Email address:</label>
                                {!! Form::email('username', null, ['class' => 'form-control', 'required', 'id'=>'emmail_login', 'placeholder'=> 'Email Address . . .']) !!}

                                <span class="error-notice"></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password:</label>
                                <input id="password_login" required name="password" type="password"
                                       class="form-control input-lg m-log"
                                       placeholder="Password . . .">
                                <span class="error-notice"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i>
                                    LOGIN NOW
                                </button>
                            </div>
                        </form>
                        <p class="">
                            <a style="color: #134303;"
                               href="{{ url('/forgot-password')}}">Forgot your
                                password?</a>
                        </p>
                    </div>
                    <div class="col-md-12">

                        @include("frontend.common.register_social")
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


