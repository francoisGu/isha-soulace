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

            {{ Former::text('postcode')->label('')->class('input-xxlarge form-control')->placeholder('Enter postcode here...') }}
    
            {{ Former::submit('search', 'SEARCH')->class("btn btn-medium btn-danger btn-outline") }}

            <a class="btn btn-medium btn-danger btn-outline" href="{{ URL::to('admin/serviceProviders') }} ">BACK</a>


        {{ Former::close() }}
        <br/>

        {{ $map['html'] }}
    </body>

@stop
