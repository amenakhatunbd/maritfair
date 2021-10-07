@extends('frontend.master')

@section('title', '')

@section('content')

<section class="login-register-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<div class="row">
						<div class="col-md-4" style="padding: 0px;">
							<div class="banar-login">
								<div>
									<img src="/storage/uploads/slide1.jpg">
								</div>
								<div>
									<img src="/storage/uploads/slide.jpg">
								</div>
							</div>
						</div>
						<div class="col-md-8" style="padding: 0px;">
							<div class="panel panel-login">
						    <div class="row">
						        <div class="col-lg-8 col-lg-offset-2">
						            <ul class="nav nav-tabs nav-pills">
                                      <li class="active"><a data-toggle="tab" href="#home">Login</a></li>
                                      <li><a data-toggle="tab" href="#menu1">Register</a></li>
                                    </ul>
                                    
                                    <div class="tab-content">
                                      <div id="home" class="tab-pane fade in active">
                                        <div class="login-section">
            								    <form id="login-form" action="{{ url('/login') }}" method="post" class="login-form-wraper smAuthHide smAuthForm" style="display: block;">
                								    {!! csrf_field() !!}
                									<div class="form-group">
                										<!--<input type="text" autocomplete="off" name="username" id="username" tabindex="1" class="form-control only-border" placeholder="Username" value="">-->
                										{!! Form::email('username', null, ['class' => 'form-control only-border', 'required', 'autocomplete'=>'off', 'id'=>'username', 'tabindex' => '1',  'placeholder'=> 'Username']) !!}
                									</div>
                									<div class="form-group">
                										<!--<input type="password" autocomplete="off" name="password" id="password" tabindex="2" class="form-control only-border" placeholder="Password">-->
                										<input required name="password" autocomplete="off" id="password" tabindex="2" type="password"
                                                               class="form-control only-border"
                                                               placeholder="********">
                									</div>
                									<div class="form-group">
                										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                										<label for="remember"> Remember Me</label>
                									</div>
                									<div class="form-group">
                										<div class="row">
                											<div class="col-sm-6 col-sm-offset-3">
                												<!--<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">-->
                												<button type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login">Log In</button>
                											</div>
                										</div>
                									</div>
                									<div class="form-group">
                										<div class="row">
                											<div class="col-lg-12">
                												<div class="text-center">
                													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                												</div>
                											</div>
                										</div>
                									</div>
                								</form>
            								</div>
                                      </div>
                                      <div id="menu1" class="tab-pane fade">
                                        <div class="register-section">
            								    {{ Form::open(['url' => ['/register'], 'id' => 'register-form', 'class'=>'smAuthForm form', 'method'=>'post',]) }}
                									<div class="form-group">
                										<input type="text" name="name" id="username" autocomplete="off" tabindex="1" class="form-control only-border" required placeholder="Full Name" value="">
                									</div>
                									<div class="form-group">
                										<input type="email" name="email" id="email" autocomplete="off" tabindex="1" class="form-control only-border" required placeholder="Email Address" value="">
                									</div>
                									<div class="form-group">
                										<input type="text" name="mobile" id="mobile" tabindex="1" autocomplete="off" class="form-control only-border" required placeholder="Phone" value="">
                									</div>
                									<div class="form-group">
                										<input type="password" name="password" id="password" autocomplete="off" tabindex="2" class="form-control only-border" required placeholder="Password">
                									</div>
                									<div class="form-group">
                										<input type="password" name="password_confirmation" autocomplete="off" id="confirm-password" tabindex="2" class="form-control only-border" placeholder="Confirm Password">
                									</div>
                									<div class="form-group">
                										<div class="row">
                											<div class="col-sm-6 col-sm-offset-3">
                												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                											</div>
                										</div>
                									</div>
                								{!! Form::close() !!}
            								</div>
                                      </div>
                                    </div>
						        </div>
						    </div>
						
						
					<!--<div class="panel-heading">-->
					<!--	<div class="row">-->
					<!--		<div class="col-md-offset-3 col-md-6">-->
					<!--			<div class="row">-->
					<!--				<div class="col-xs-6">-->
					<!--			<a href="#" class="active" id="login-form-link">Login</a>-->
								
					<!--		</div>-->
					<!--		<div class="col-xs-6">-->
					<!--			<a href="#" id="register-form-link">Register</a>-->
					<!--		</div>-->
					<!--			</div>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--	<hr>-->
					<!--</div>-->
				<!--	<div class="panel-body">-->
				<!--		<div class="row">-->
				<!--			<div class="col-lg-12">-->
								<!--<form id="login-form" action="" method="post" role="form" style="display: block;">-->
								<!--	<div class="form-group">-->
								<!--		<input type="text" autocomplete="off" name="username" id="username" tabindex="1" class="form-control only-border" placeholder="Username" value="">-->
								<!--	</div>-->
								<!--	<div class="form-group">-->
								<!--		<input type="password" autocomplete="off" name="password" id="password" tabindex="2" class="form-control only-border" placeholder="Password">-->
								<!--	</div>-->
								<!--	<div class="form-group">-->
								<!--		<input type="checkbox" tabindex="3" class="" name="remember" id="remember">-->
								<!--		<label for="remember"> Remember Me</label>-->
								<!--	</div>-->
								<!--	<div class="form-group">-->
								<!--		<div class="row">-->
								<!--			<div class="col-sm-6 col-sm-offset-3">-->
								<!--				<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">-->
								<!--			</div>-->
								<!--		</div>-->
								<!--	</div>-->
								<!--	<div class="form-group">-->
								<!--		<div class="row">-->
								<!--			<div class="col-lg-12">-->
								<!--				<div class="text-center">-->
								<!--					<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>-->
								<!--				</div>-->
								<!--			</div>-->
								<!--		</div>-->
								<!--	</div>-->
								<!--</form>-->
								<!--<form id="register-form" action="" method="post" role="form" style="display: none;">-->
								<!--	<div class="form-group">-->
								<!--		<input type="text" name="full_name" id="username" autocomplete="off" tabindex="1" class="form-control only-border" placeholder="Full Name" value="">-->
								<!--	</div>-->
								<!--	<div class="form-group">-->
								<!--		<input type="email" name="email" id="email" autocomplete="off" tabindex="1" class="form-control only-border" placeholder="Email Address" value="">-->
								<!--	</div>-->
								<!--	<div class="form-group">-->
								<!--		<input type="text" name="phone" id="email" tabindex="1" autocomplete="off" class="form-control only-border" placeholder="Phone" value="">-->
								<!--	</div>-->
								<!--	<div class="form-group">-->
								<!--		<input type="password" name="password" id="password" autocomplete="off" tabindex="2" class="form-control only-border" placeholder="Password">-->
								<!--	</div>-->
								<!--	<div class="form-group">-->
								<!--		<input type="password" name="confirm-password" autocomplete="off" id="confirm-password" tabindex="2" class="form-control only-border" placeholder="Confirm Password">-->
								<!--	</div>-->
								<!--	<div class="form-group">-->
								<!--		<div class="row">-->
								<!--			<div class="col-sm-6 col-sm-offset-3">-->
								<!--				<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">-->
								<!--			</div>-->
								<!--		</div>-->
								<!--	</div>-->
								<!--</form>-->
								<!--<form id="register-form" action="/register" method="post" role="form" class="smAuthForm form" style="display: none;">-->
								<!--<div class="login-section">-->
								<!--    <form id="login-form" action="{{ url('/login') }}" method="post" class="login-form-wraper smAuthHide smAuthForm" style="display: block;">-->
    				<!--				    {!! csrf_field() !!}-->
    				<!--					<div class="form-group">-->
    										<!--<input type="text" autocomplete="off" name="username" id="username" tabindex="1" class="form-control only-border" placeholder="Username" value="">-->
    				<!--						{!! Form::email('username', null, ['class' => 'form-control only-border', 'required', 'autocomplete'=>'off', 'id'=>'username', 'tabindex' => '1',  'placeholder'=> 'Username']) !!}-->
    				<!--					</div>-->
    				<!--					<div class="form-group">-->
    										<!--<input type="password" autocomplete="off" name="password" id="password" tabindex="2" class="form-control only-border" placeholder="Password">-->
    				<!--						<input required name="password" autocomplete="off" id="password" tabindex="2" type="password"-->
        <!--                                           class="form-control only-border"-->
        <!--                                           placeholder="********">-->
    				<!--					</div>-->
    				<!--					<div class="form-group">-->
    				<!--						<input type="checkbox" tabindex="3" class="" name="remember" id="remember">-->
    				<!--						<label for="remember"> Remember Me</label>-->
    				<!--					</div>-->
    				<!--					<div class="form-group">-->
    				<!--						<div class="row">-->
    				<!--							<div class="col-sm-6 col-sm-offset-3">-->
    												<!--<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">-->
    				<!--								<button type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login">Log In</button>-->
    				<!--							</div>-->
    				<!--						</div>-->
    				<!--					</div>-->
    				<!--					<div class="form-group">-->
    				<!--						<div class="row">-->
    				<!--							<div class="col-lg-12">-->
    				<!--								<div class="text-center">-->
    				<!--									<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>-->
    				<!--								</div>-->
    				<!--							</div>-->
    				<!--						</div>-->
    				<!--					</div>-->
    				<!--				</form>-->
								<!--</div>-->
								<!--<div class="register-section">-->
								<!--    {{ Form::open(['url' => ['/register'], 'id' => 'register-form', 'class'=>'smAuthForm form', 'method'=>'post','style' => 'display: none']) }}-->
    				<!--					<div class="form-group">-->
    				<!--						<input type="text" name="name" id="username" autocomplete="off" tabindex="1" class="form-control only-border" required placeholder="Full Name" value="">-->
    				<!--					</div>-->
    				<!--					<div class="form-group">-->
    				<!--						<input type="email" name="email" id="email" autocomplete="off" tabindex="1" class="form-control only-border" required placeholder="Email Address" value="">-->
    				<!--					</div>-->
    				<!--					<div class="form-group">-->
    				<!--						<input type="text" name="mobile" id="mobile" tabindex="1" autocomplete="off" class="form-control only-border" required placeholder="Phone" value="">-->
    				<!--					</div>-->
    				<!--					<div class="form-group">-->
    				<!--						<input type="password" name="password" id="password" autocomplete="off" tabindex="2" class="form-control only-border" required placeholder="Password">-->
    				<!--					</div>-->
    				<!--					<div class="form-group">-->
    				<!--						<input type="password" name="password_confirmation" autocomplete="off" id="confirm-password" tabindex="2" class="form-control only-border" placeholder="Confirm Password">-->
    				<!--					</div>-->
    				<!--					<div class="form-group">-->
    				<!--						<div class="row">-->
    				<!--							<div class="col-sm-6 col-sm-offset-3">-->
    				<!--								<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">-->
    				<!--							</div>-->
    				<!--						</div>-->
    				<!--					</div>-->
    				<!--				{!! Form::close() !!}-->
								<!--</div>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
						</div>
					</div>
			</div>
		</div>
	</div>
</section>


@endsection