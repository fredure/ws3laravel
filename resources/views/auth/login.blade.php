@extends('layouts.app')

@section('content')
	
	@if(count($errors))

		<div class="errors">
			@foreach($errors->all() as $error)
				<div>{{ $error }}</div>
			@endforeach
		</div>

	@endif

	<form action="{{ route('auth.login.post')}}" method="POST">
		{!! csrf_field() !!}

		<h2>Авторизация</h2>
		<a href="{{ route('auth.reg') }}">Регистрация</a>
		<div class="form-group">
			<label>Email:</label>	
			<input type="text" name="email" value="{{ old('email') }}">
		</div>
		<div class="form-group">
			<label>Пароль:</label>	
			<input type="password" name="password">
		</div>
		<div class="form-group">
			<button name="btnAuth" class="btn">Войти</button>
		</div>
	</form>

@endsection