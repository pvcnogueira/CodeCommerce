@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Editing Category: {{ $category->name }}</h1>
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
            {!! Form::open(['route'=>['categories.update', $category->id], 'method' => 'PUT']) !!}

        <div class="form-group">
            {{--{!! Form::label('name', 'Name:') !!}--}}
            {!! Form::label('name', 'Name:') !!}
            {{--{!! Form::text('name', value, ['class'=>'form-control']) !!}--}}
            {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::submit('Update Class', ['class'=>'btn btn-primary']) !!}

            <a href="{{ route('categories.index') }}">
                <input type="button" class="btn" value="Cancel"></input>
            </a>
         </div>
       {!! Form::close() !!}
    </div>
</div>

@endsection