<html>
	<head>
		<title>Hi</title>
		{{ Asset::styles() }}
		{{ Asset::scripts() }}
	</head>

	<body>
    <div class="container">
   @yield('content') 
    </div>
  <body>
</html>