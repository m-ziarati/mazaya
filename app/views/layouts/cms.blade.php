<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf8" />
	<link rel="stylesheet"  href="{{{ asset('css/cms.css') }}}" />
	<link rel="stylesheet"  href="{{{ asset('css/bootstrap.css') }}}" />
	<link rel="stylesheet" href="{{{ asset('font-awesome-4.3.0/css/font-awesome.min.css') }}}">
	
</head>
<body>
	<div id="header">
		<div class="wrapper">
			<div class="title">
				<h2>صفحه مدیریت</h2>
			</div>
		</div>
	</div>
	<!-- !-->
	<div id="body">
		<div class="wrapper">
			<div class="float">
				<div class="right-link">
					<a href="{{{ route('article.list') }}}">خبرها</a>
					<a href="{{{ route('category.list') }}}">دسته بندی</a>
				</div>
			</div>
			<!-- !-->
			<div class="float">
				@yield('content')
			</div>
			<!-- !-->
			<div class="clearfix"></div>
		</div>
	</div>
</body>
</html>