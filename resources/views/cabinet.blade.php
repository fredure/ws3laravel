@extends('layouts.app')

@section('content')
	<div class="main">
		<div class="row">
			<div class="hover"></div>
			<div class="title"></div>
			<div class="row--small grid between">
				<div class="content driver-page">
					<div class="driver-page-photo">
						<img src="{{ $user->photo }}">
					</div>	
					<div class="driver-page-name">{{ $user->fio }}</div>
					<div class="driver-page-text">
						<div class="driver-page-my">Мои мастер-классы</div>
						<table class="driver-page-table">
							<tbody>
								@foreach ($user->masterClasses as $masterClass)
									<tr>
										<td>
											<div>
												{{ $masterClass->datetime }}
											</div>
										</td>
										<td>
											@foreach ($masterClass->ordereds as $index => $ordered)
												<p>
													{{ $index+1 }}. {{ $ordered->user->fio }}<br>
												 	email: {{ $ordered->user->email }}<br>
												 	tel: {{ $ordered->user->phone }}
												</p>
											@endforeach
										</td>
										<td>
											<a class="btn" href="{{ route('home.edit', $masterClass->id) }}">изменить</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="driver-page-btn-wrapper">
						<a href="{{ route('home.add') }}" class="driver-page-btn btn">
							Добавить мастер-класс
						</a>
					</div>
				</div>
				@include('partials.menu', ['views' => $views]) 
			</div>
	@endsection