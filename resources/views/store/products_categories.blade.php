@extends('store.store')

@section('categories')
	@include('store.categories_partial', $categories)
@stop

@section('content')
			<div class="col-sm-9 padding-right">
				<!--features_items-->
                <div class="features_items">
                    <h2 class="title text-center">{{$category->name}}</h2>

					@if(count($category->products) > 0)
						@foreach($category->products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">

										@if(isset($product->images[0]))
											<img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" width="200px"/>
										@else
											<img src="{{ url('images/no-img.jpg')}}" alt="" width="200px"/>
										@endif

										<h2>R$ {{$product->price}}</h2>

										<p>{{$product->name}}</p>
										<a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i
												class="fa fa-crosshairs"></i>Mais detalhes</a>

										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
											no carrinho</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>R$ {{$product->price}}</h2>

											<p>{{$product->name}}</p>
											<a href=""
											   class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais
												detalhes</a>

											<a href=""
											   class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
												no carrinho</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					@else
					<div class="col-sm-12 text-center">
						<h3>Nenhum Produto Nessa Categoria</h3>
					</div>

					@endif
                </div>
                <!--features_items-->
            </div>

@stop