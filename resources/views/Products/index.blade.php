@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Products</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-10">
            <a href="{{URL::route('products.create')}}" class="btn btn-primary">New Product</a>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Tags</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Recommend</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <th>{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->tagList}}</td>
                    <td>{{$product->price }}</td>
                    <td>{{$product->category->name }}</td>
                    <td>{{$product->featured }}</td>
                    <td>{{$product->recommend }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['id'=>$product->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{{ route('products.images.index', ['id'=>$product->id]) }}"><i class="glyphicon glyphicon-camera"></i></a>
                        <a href="{{ route('products.destroy', ['id'=>$product->id]) }}"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{--Pagination--}}
            {!! $products->render() !!}
        </div>
    </div>

@endsection