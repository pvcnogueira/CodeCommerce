@foreach($products as $product)
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">

					@if(isset($product->images[0]))
						<img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" width="200px"/>
					@else
						<img src="{{ url('images/no-img.jpg')}}" alt="" width="200px"/>
					@endif

					<h2>R$ {{number_format($product->price, 2, ',', '.')}}</h2>

					<p>{{$product->name}}</p>
					<a href="{{ route('store.product.detail', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i
							class="fa fa-crosshairs"></i>Mais detalhes</a>

					<a href="{{route('store.cart.add', ['id' => $product->id, 'qtd' => 1])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
						no carrinho</a>
				</div>
				<div class="product-overlay">
					<div class="overlay-content">
						<h2>R$ {{number_format($product->price, 2, ',', '.')}}</h2>

						<p>{{$product->name}}</p>
						<a href="{{ route('store.product.detail', ['id' => $product->id]) }}"
						   class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais
							detalhes</a>

						<a href="{{route('store.cart.add', ['id' => $product->id, 'qtd' => 1])}}"
						   class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar
							no carrinho</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach