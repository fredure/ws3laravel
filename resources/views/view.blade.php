@extends('layouts.app')

@section('content')

	<div class="hover"></div>
	<div class="title">{{ $view->name }}</div>
	<div class="row--small grid between">
		<div class="content">
			{{ $view->description }}
		</div>
		@include('partials.menu', ['views' => $views])
	</div>

	@if(count($view->masterClasses) > 0)

		<div class="row shedule">
			<div class="row--small">
				<h2>Расписание</h2>
				<div class="drivers">
					
					@foreach($view->masterClasses as $masterClass)

						<div class="driver grid">
							<div class="driver-left grid">
								<div class="driver-photo">
									<img src="{{ $masterClass->user->photo }}">
								</div>
								<div class="driver-text">
									<div class="driver-name">{{ $masterClass->user->fio }}</div>
									<div class="driver-desc">{{ $masterClass->description }}</div>
								</div>
							</div>
							<div class="driver-right">
								<a href="{{ route('home.order', $masterClass->id) }}" class="driver-btn">записаться</a>
								<div class="driver-time">{{ $masterClass->datetime }}</div>
							</div>	
						</div>

					@endforeach

				</div>
			</div>
		</div>

	@endif

@endsection