@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Create Product</h1>
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
       {!! Form::open(['route'=>'products.store']) !!}
        <div class="form-group">
            {{--{!! Form::label('name', 'Name:') !!}--}}
            {!! Form::label('name', 'Name:') !!}
            {{--{!! Form::text('name', value, ['class'=>'form-control']) !!}--}}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['rows' => 4, 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            <input type="number" name="price" step="0.01"/>
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags', 'Tags:') !!}
            {!! Form::textarea('tags', null, ['placeholder' => 'Separadas por vírgulas', 'rows' => 2, 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <div class="radio">
                <label>
                    Featured:
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="featured" value="1"/>
                    Yes
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="featured" value="0" checked/>
                    No
                </label>
            </div>
            <div class="radio">
                <label>
                    Recommend:
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="recommend" value="1"/>
                    Yes
                </label>
                <label for="" class="radio-inline">
                    <input type="radio" name="recommend" value="0" checked/>
                    No
                </label>
            </div>
        </div>

         <div class="form-group">
             {!! Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}

             <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
         </div>
       {!! Form::close() !!}
    </div>
</div>

@endsection