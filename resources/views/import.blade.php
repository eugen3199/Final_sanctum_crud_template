<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Import</title>
</head>
<body>
	<form action="/api/employees/import" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="client" value="test">
		<input type="file" name="file">
		<input type="submit" name="submit" value="Import">
	</form>
</body>
</html>