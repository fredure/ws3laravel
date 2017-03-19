<ul class="menu">
	@foreach($views as $view)
		<li><a href="{{ route('home.view', $view->id) }}">{{ $view->name }}</a></li>
	@endforeach
</ul>
	