<nav class="navbar navbar-expand-md navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="offcanvas">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="{{ route('welcome') }}" class="logo-admin"><img src="{{asset('images/logo.png')}}" width="100px" alt=""></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Đăng Xuất') }}</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
		</ul>
	</div>
</nav>