<!DOCTYPE html>
<html lang="en">
    <head>
        {{ $map['js'] }}
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        {{ Form::open(array('url' => 'map/map', 'class' => 'form-map')) }}

    	    <ul>
    	    	@foreach($errors->all() as $error)
    	    		<li>{{ $error }}</li>
    	    	@endforeach
    	    </ul>

	        {{ Form::text('postcode', null, array('class'=>'input-block-level', 'placeholder'=>'postcode')) }}

        {{ $map['html'] }}
    </body>
</html>
