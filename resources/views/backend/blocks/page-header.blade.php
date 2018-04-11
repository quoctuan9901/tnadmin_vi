<div class="page-header page-header-inverse has-cover">
	<div class="page-header-content">
		<div class="page-title">
			<h5>
				<span class="text-semibold">@yield('controller','Module')</span> - @yield('action','Action')
				<small class="display-block">Tác Giả : {{ $config_site->author }}</small>
			</h5>
		</div>

		<div class="heading-elements">
            <button class="btn btn-link btn-icon btn-sm heading-btn"><i class="icon-gear"></i></button>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="{{ route('admin.dashboard.index') }}"><i class="icon-home2 position-left"></i> Bảng Điều Khiển</a></li>
			<li><a href="@yield('back')">@yield('controller')</a></li>
			<li class="active">@yield('action')</li>
		</ul>
	</div>
</div>