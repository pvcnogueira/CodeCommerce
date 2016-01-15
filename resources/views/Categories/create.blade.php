@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Create Category</h1>
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
       {!! Form::open(['route'=>'categories.store']) !!}
        <div class="form-group">
            {{--{!! Form::label('name', 'Name:') !!}--}}
            {!! Form::label('name', 'Name:') !!}
            {{--{!! Form::text('name', value, ['class'=>'form-control']) !!}--}}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
             {!! Form::submit('Add Class', ['class'=>'btn btn-primary']) !!}

             <a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a>
         </div>
       {!! Form::close() !!}
    </div>
</div>

@endsection