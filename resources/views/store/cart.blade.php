@extends('store.store')

@section('content')
			<div class="col-sm-12">
				<!--features_items-->
                <div class="features_items">
                    <h2 class="title text-center">Carrinho</h2>
					<section id="cart_items">
						<div class="table_responsive cart_info">
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<th class="image">Item</th>
										<th class="description"></th>
										<th class="price">Valor</th>
										<th class="cart_quantity">Quantidade</th>
										<th class="price">Total</th>
										<th class="price"></th>
									</tr>
								</thead>
								<tbody>
								@forelse($cart->all() as $k=>$item)
									<tr>
										<td class="cart_product">
											<a href="{{ route('product.detail', ['id' => $k]) }}">
												@if(isset($item->images[0]))
													<img src="{{ url('uploads/'.$item->images->first()->id.'.'.$item->images->first()->extension)}}" width="80px"/>
												@else
													<img src="{{ url('images/no-img.jpg')}}" alt="" width="80px"/>
												@endif
											</a>
										</td>
										<td class="cart_description">
											<h4>
												<a href="{{ route('product.detail', ['id' => $k]) }}">
													{{ $item['name'] }}
												</a>
											</h4>
											<p>Código: {{ $k }}</p>
										</td>
										<td class="cart_price">
											R$ {{ $item['price'] }}
										</td>
										<td class="cart_quantity">
											<input onchange="setQtd(this.value, {{$k}}, {{ $item['price'] }})" type="number" min="1" value="{{ $item['qtd'] }}"/>
										</td>
										<td class="cart_totalprice">
											R$ <span id="{{$k}}total">{{ $item['price'] * $item['qtd'] }}</span>
										</td>
										<td class="cart_delete">
											<a href="{{ route('cart.destroy', ['id' => $k]) }}">Excluir</a>
										</td>
									</tr>
								@empty
									<tr>
										<td class="text-center" colspan="6">
											<h2>Nenhum produto no carrinho!</h2>
										</td>
									</tr>
								@endforelse
								<tr class="cart_menu">
									<td colspan="4"></td>
									<td class="cart_totalprice">
										TOTAL: R$ <span id="total">{{ $cart->getTotal() }}</span>
									</td>
									<td>
										<a class="btn btn-success" href="">Finalizar</a>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
					</section>
                </div>
            </div>

			<script>
				function setQtd(qtd, id, price){
					var caminho = "{{ route('cart.add') }}";
					caminho = caminho.split('/');
					caminho.pop();
					caminho.pop();
					if(qtd < 1){
						qtd = 1;
					}
					total = $('#total').text();
					total = total - $('#'+id+'total').text();
					$('#'+id+'total').text((qtd*price).toFixed(2));
					$('#total').text((total+parseFloat($('#'+id+'total').text())).toFixed(2));

					caminho = caminho.join('/')+'/'+id+'/'+qtd;
					console.log(caminho);
					$.ajax({
						url: caminho,
						type: 'get'
					}).success(function(){
						console.log("adicionado com sucesso");
					}).error(function(e){
						console.dir(e);
					});
				}
			</script>
@stop