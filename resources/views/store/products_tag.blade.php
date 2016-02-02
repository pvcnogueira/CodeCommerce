@extends('store.store')

@section('categories')
	@include('store.partial.categories', $categories)
@stop

@section('content')
			<div class="col-sm-9 padding-right">
				<!--features_items-->
                <div class="features_items">
                    <h2 class="title text-center">{{$tag->name}}</h2>

					@if(count($tag->products) > 0)
						@include('store.partial.products', ['products' => $tag->products])
					@else
					<div class="col-sm-12 text-center">
						<h3>Nenhum Produto Nessa Tag</h3>
					</div>

					@endif
                </div>
                <!--features_items-->
            </div>

@stop