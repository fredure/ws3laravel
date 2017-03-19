@extends('layouts.app')

@section('content')
	<div class="row--small">
		<form method="POST" action="{{ route('home.add.post') }}">
			{!! csrf_field() !!}
			<h2>Форма добавления мастер-класса</h2>
			<div class="form-group">
				<label>Вид творчества</label>
				<select name="view" required>
					@foreach($views as $view)
						<option value="{{ $view->id }}">{{ $view->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Название мастер-класса</label>
				<input type="text" name="name" required name="{{ old('name') }}">
			</div>
			<div class="form-group">
				<label>Описание мастер-класса</label>
				<textarea name="description" required name="{{ old('description') }}"></textarea>
			</div>
			<div class="form-group">
				<label>Время</label>
				<table>
					<thead>
						<tr>
							<th>Time</th>
							@foreach($thead as $index => $th)
								<th>{{ $th }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach ($data as $key => $row)
							<tr>
								<td>{{ $key }}</td>
								@foreach($row as $datetime => $cell)
									<td>
										@if($cell !== null)
											<input disabled type="radio">
										@else
											<input type="radio" name="datetime" value="{{ $datetime }}">
										@endif
									</td>
								@endforeach
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="form-group">
				<label>Количество человек в группе</label>
				<input type="text" name="humans" required name="{{ old('price') }}">
			</div>
			<div class="form-group">
				<label>Стоимость</label>
				<input type="text" name="price" required name="{{ old('price') }}">
			</div>
			<div class="form-group">
				<button class="btn" name="btnAddClass">Отправить</button>
			</div>
		</form>
	</div>
@endsection