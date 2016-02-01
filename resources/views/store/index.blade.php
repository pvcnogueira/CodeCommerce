@extends('store.store')

@section('categories')
	@include('store.categories_partial', $categories)
@stop

@section('content')
			<div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Em destaque</h2>

					@foreach($featureds as $featured)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">

									@if(isset($featured->images[0]))
                                    	<img src="{{ url('uploads/'.$featured->images->first()->id.'.'.$featured->images->first()->extension)}}" width="200px"/>
									@else
										<img src="{{ url('images/no-img.jpg')}}" alt="" width="200px"/>
									@endif

                                    <h2>R$ {{$featured->price}}</h2>

                                    <p>{{$featured->name}}</p>
                                    <a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i
                                            class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
                                        no carrinho</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>R$ {{$featured->price}}</h2>

                                        <p>{{$featured->name}}</p>
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
                </div>
                <!--features_items-->


				<div class="features_items"><!--recommended-->
					<h2 class="title text-center">Recomendados</h2>

					@foreach($recommendeds as $recommended)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">


									@if(isset($recommended->images[0]))
										<img src="{{ url('uploads/'.$recommended->images->first()->id.'.'.$recommended->images->first()->extension)}}" alt="" width="200px"/>
									@else
										<img src="{{ url('images/no-img.jpg')}}" alt="" width="200px"/>
									@endif
									<h2>R$ {{$recommended->price}}</h2>

									<p>{{$recommended->name}}</p>
									<a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i
											class="fa fa-crosshairs"></i>Mais detalhes</a>

									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
										no carrinho</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>R$ {{$recommended->price}}</h2>

										<p>{{$recommended->name}}</p>
										<a href="http://commerce.dev:10088/product/4"
										   class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais
											detalhes</a>

										<a href="http://commerce.dev:10088/cart/4/add"
										   class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
											no carrinho</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
                <!--recommended-->

            </div>

@stop