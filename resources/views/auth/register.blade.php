@extends('layouts.app')


@section('content')

	@if(count($errors))

		<div class="errors">
			@foreach($errors->all() as $error)
				<div>{{ $error }}</div>				
			@endforeach
		</div>

	@endif

	<form action="{{ route('auth.reg.post')}}" method="POST">
		{!! csrf_field() !!}

		<h2>Форма регистрации</h2>
		<a href="{{ route('auth.login') }}">Авторизация</a>
		<div class="form-group">
			<label>ФИО</label>
			<input type="text" name="fio" value="{{ old('fio') }}">
		</div>
		<div class="form-group">
			<label>Email (email@email.com)</label>
			<input type="text" name="email" value="{{ old('email') }}">
		</div>
		<div class="form-group">
			<label>Пароль</label>
			<input type="password" name="password">
		</div>
		<div class="form-group">
			<label>Номер телефона (+7XXX-XX-XX-XXX)</label>
			<input type="tel" name="phone" pattern="^\+7[\d]{3}-[\d]{2}-[\d]{2}-[\d]{3}$" value="{{ old('phone') }}">
		</div>
		<div class="form-group">
			<button name="btnReg" class="btn">Отправить</button>
		</div>
	</form>

@endsection