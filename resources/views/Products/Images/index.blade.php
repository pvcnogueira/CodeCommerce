@extends('......app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Images of {{ $product->name }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-md-offset-10">
        <a href="{{ route('products.images.create', ['id' => $product->id])}}" class="btn btn-primary">New Image</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Extension</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                @foreach($product->images as $image)
                <tr>
                    <th>{{$image->id}}</th>
                    <td>
                        <img  class="thumbnail" src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="120px" alt=""/>
                    </td>
                    <td>{{$image->extension}}</td>
                    <td>
                        <a href="{{ route('products.images.destroy', ['id'=>$image->id]) }}"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('products.index') }}" class="btn btn-default">Voltar</a>
    </div>
</div>

@endsection