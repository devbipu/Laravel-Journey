<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User {{ $user->name }}</title>
</head>
<body>
	<section style="background: #F0F2F5">
		<div style="border: 2px solid #ddd; border-radius: 3px; padding: 20px;">
			Name: {{ $user->name }}
			Email: {{ $user->email }}
		</div>
	</section>
</body>
</html>