<!DOCTYPE html>

<html>

<head>

	<title>Laravel 5 - Populate select box from database example</title>

</head>

<body>



{!! Form::open() !!}



{!! Form::select('bus_pn', $bus, null, ['class' => 'form-control']) !!}



{!! Form::close() !!}



</body>

</html>