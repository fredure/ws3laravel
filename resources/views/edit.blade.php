@extends('layouts.app')

@section('content')
	<div class="row row--small">
		<form action="{{ route('home.edit.post') }}" method="POST">
			{!! csrf_field() !!}
			<div class="form-group">
				<label for="">Описание</label>
				<input type="text" name="description" required value="{{ $masterClass->description }}">
			</div>
			<div class="form-group">
				<label for="">Стоимость</label>
				<input type="text" name="price" required value="{{ $masterClass->price }}">
			</div>
			<input type="hidden" name="id" value="{{ $masterClass->id }}">
			<div class="form-group">
				<button type="submit" class="btn" name="btnEdit">Сохранить</button>
			</div>
		</form>
	</div>

@endsection