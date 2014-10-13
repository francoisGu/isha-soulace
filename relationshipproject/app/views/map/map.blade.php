@extends('layouts.main')

@section('main')
    <head>
        {{ $map['js'] }}
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        {{ Former::open()->url('map')->class('form-map') }}

    	    <ul>
    	    	@foreach($errors->all() as $error)
    	    		<li>{{ $error }}</li>
    	    	@endforeach
    	    </ul>

            {{ Former::text('postcode')->label('')->class('input-xxlarge')->placeholder('Enter postcode here...') }}

        {{ $map['html'] }}
        {{ Former::close() }}
    </body>

@stop
