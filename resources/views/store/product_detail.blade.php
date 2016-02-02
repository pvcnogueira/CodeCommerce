@extends('store.store')

@section('categories')
	@include('store.partial.categories', $categories)
@stop

@section('content')
	<div class="col-sm-9 padding-right">
		<div class="product-details"><!--product-details-->
			<div class="col-sm-5">
				<div class="view-product">

					<img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" alt=""/>


				</div>
				<div id="similar-product" class="carousel slide" data-ride="carousel">

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
						@foreach($product->images as $image)
							<a href="#"><img src="{{ url('uploads/'.$image->id.'.'.$image->extension)}}" alt="" width="80"></a>
						@endforeach
						</div>

					</div>

				</div>

			</div>
			<div class="col-sm-7">
				<div class="product-information"><!--/product-information-->

					<h2>{{ $product->category->name }} :: {{ $product->name }}</h2>

					<p>{{ $product->description }}</p>
					<span>
						<span>R$ {{ number_format($product->price, 2, ',', '.') }}</span>
							<a href="http://commerce.dev:10088/cart/2/add" class="btn btn-fefault cart">
								<i class="fa fa-shopping-cart"></i>
								Adicionar no Carrinho
							</a>
					</span>
					<span>
                    	<b class="bold">Tags: </b>
						@foreach($product->tags as $tag)
							<a href="{{ route('product.tag', ['id' => $tag->id]) }}">
								{{ $tag->name }}
							</a>
						@endforeach
					</span>
				</div>
				<!--/product-information-->
			</div>
		</div>
		<!--/product-details-->
	</div>
@stop