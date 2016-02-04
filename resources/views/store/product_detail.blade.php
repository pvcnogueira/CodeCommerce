@extends('store.store')

@section('categories')
	@include('store.partial.categories', $categories)
@stop

@section('content')
	<div class="col-sm-9 padding-right">
		<div class="product-details"><!--product-details-->
			<div class="col-sm-5">
				<div class="view-product">
					@if(isset($product->images[0]))
						<img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}"/>
					@else
						<img src="{{ url('images/no-img.jpg')}}" alt=""/>
					@endif
				</div>
				<div id="similar-product" class="carousel slide" data-ride="carousel">

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
						@if(isset($product->images[0]))
							@foreach($product->images as $image)
								<a href="#"><img src="{{ url('uploads/'.$image->id.'.'.$image->extension)}}" alt="" width="80"></a>
							@endforeach
						@else
							<a href="#"><img src="{{ url('images/no-img.jpg') }}" alt="" width="80"></a>
						@endif

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
						<a id="add_cart" href="{{route('cart.add', ['id' => $product->id, 'qtd' => 1])}}" class="btn btn-fefault cart">
							<i class="fa fa-shopping-cart"></i>
							Adicionar no Carrinho
						</a>
						<script>
						function setQtd(qtd){
							var a_href = $('#add_cart').attr('href');
							a_href = a_href.split('/');
							a_href.pop();
							if(qtd < 1){
								qtd = 1;
							}
							a_href = a_href.join('/')+'/'+qtd;
							$('#add_cart').attr('href', a_href);
							}
						</script>
					</span>
					<span>
						Qtd: <input onchange="setQtd(this.value)" min="1" type="number" value="1"/>
					</span>
					<br/>
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