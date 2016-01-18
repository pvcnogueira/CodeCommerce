@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Categories</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-md-offset-10">
        <a href="{{URL::route('categories.create')}}" class="btn btn-primary">Novo</a>
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
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <th>{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <a href="{{ route('categories.edit', ['id'=>$category->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{{ route('categories.destroy', ['id'=>$category->id]) }}"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $categories->render() !!}
    </div>
</div>

@endsection