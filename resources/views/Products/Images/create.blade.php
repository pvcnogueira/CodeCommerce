@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Upload Image</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

        @if ($errors->any())
            <ul class="bg-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open([
        'route'=>['products.images.store', $product->id],
        'method' =>'post',
        'enctype' => 'multipart/form-data'
        ]) !!}

        <div class="form-group">
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image', null, ['class'=>'form-control']) !!}
        </div>
       
        <div class="form-group">
            {!! Form::submit('Upload Image', ['class'=>'btn btn-primary']) !!}
            
            <a href="{{ route('products.images.index', ['id' => $product->id]) }}" class="btn btn-default">Cancel</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection