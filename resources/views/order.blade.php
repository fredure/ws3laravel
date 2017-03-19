@extends('layouts.app')

@section('content')
	
	<div class="row row--small">
		<br>
		{{-- <div>Ваше фио: {{ $masterClass->user->fio }}</div> --}}
		<div>Фио мастера: {{ $masterClass->fio }}</div>
		<div>Вид творчества: {{ $masterClass->name }}</div>
		<div>Дата: {{ $masterClass->datetime }}</div>
		<br>

		@if($count >= $masterClass->humans)

			<div>Количество людей заполнено</div>
			<br>

		@else

			<div>Количество свободных мест: {{ $masterClass->humans - $count }}</div>
			<br>
			<form action="{{ route('home.ok') }}" method="POST">
				<input type="hidden" name="id" value="{{ $masterClass->id }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn ok">Подтвердить</button>
			</form>
			<br>

		@endif

		<div><a href="{{ route('home.view', $masterClass->view->id) }}" class="btn cancel" data-id="{{ $masterClass->id }}">Отмена</a></div>
		<br><br>
	</div>

@endsection