@extends('layouts.handler')

@section('content')

<div class="container">
	<h1 class="page-heading" id="cart-title">Indkøbskurv </h1>
	<div class="row">
		<div class="col-md-12">
			<table id="cart_summary" class="table table-bordered stock-management-on">
                <thead>
										<tr>
											<th class="cart_product first_item">Vare</th>
											<th class="cart_description item">Beskrivelse</th>
											<th class="cart_unit item text-right">Pris</th>
											<th class="cart_quantity item text-center">Antal</th>
											<th class="cart_delete last_item">&nbsp;</th>
											<th class="cart_total item text-right">I alt</th>
										</tr>
                </thead>
                <tbody>
                    @foreach($tires as $tire)
                        <tr data-tire="{{$tire['id']}}" class="cart_item">
                            @if(!is_null($tire['image_1']))
                                <td class="cart_product">
                                    <a href="{{ asset('uploads/' . $tire['image_1']) }}" target="_blank">
																			<img src="{{ asset('uploads/thumb/' . $tire['image_1']) }}"/>
																		</a>
                                </td>
                            @else
                                <td></td>
                            @endif
                            <td class="cart_description">
															<p class="product-name">
																<a href="{{ action('UsersTireProductController@show', $tire['id']) }}" target="_blank">
	                                {{$tire['name']}}
	                            	</a>
															</p>
															<small>
																<a>Brand: {{$tire['brand']['name']}}</a>
															</small>
															<small>
																<a>Size: {{$tire['size']['size']}}</a>
															</small>
													</td>
                            <td class="cart_unit">
															<span class="price">{{$tire['price']}} kr</span>
														</td>
                            <td class="cart_quantity text-center">
															<div class="cart_quantity_input form-control grey" data-tirecounter="{{$tire['id']}}">
																{{$tire['count']}}
															</div>
															<div class="cart_quantity_button clearfix">
																<a rel="nofollow" class="cart_quantity_down btn btn-default button-minus">
																	<span data-tire="{{$tire['id']}}" data-version="3" class="glyphicon glyphicon-plus add-one-tire" style="cursor: pointer;"></span>
																</a>
																<a rel="nofollow" class="cart_quantity_up btn btn-default button-plus">
																	<span data-tire="{{$tire['id']}}" data-preorder="{{session('pre_order')}}" class="glyphicon glyphicon-minus remove-one-tire" style="cursor: pointer;"></span>
																</a>
															</div>
														</td>
                            <td class="cart_delete text-center">
                            	<span data-tireremove="{{$tire['id']}}" data-preorderremove="{{session('pre_order')}}" class="cart_quantity_delete glyphicon glyphicon-trash pre-order-tire-remove" style="cursor: pointer;"></span>
                            </td>
														<td class="cart_unit">
															<span data-tireprice="{{$tire['id']}}" class="price">{{$tire['price']}}</span>
														</td>
                        </tr>
                    @endforeach
                </tbody>
								<tfoot>
									<tr class="cart-total-price">
										<td colspan="2"></td>
										<td colspan="2" class="total-price-container text-right">
											<span>I alt</span>
										</td>
										<td colspan="2" class="price" id="total-price-container">
											<span id="price">{{ $price }}</span>
										</td>
									</tr>
								</tfoot>
            </table>
		</div>
	</div>
</div>

<div class="container">
	<p class="cart_navigation clearfix">
		<a href="/" class="button-exclusive btn btn-default" title="Fortsæt indkøb">
			<i class="glyphicon glyphicon-chevron-left"></i>
			Fortsæt indkøb
		</a>
	</p>
</div>

<div class="container order-opc">
	<h2 class="page-heading step-num"><span>1</span> Adresser</h2>
		<div class="row">
			<div class="col-md-6">
				<div class="address item form-box" id="address_delivery">
					<h3 class="page-subheading page-subheading-line">Leveringsadresse</h3>
					<p>{{ $pre_order->user->first_name }} {{ $pre_order->user->last_name }}</p>
					<p><b>Address: </b>{{ $pre_order->user->address }}</p>
					<p><b>Phone: </b>{{ $pre_order->user->phone }}</p>
					<p class="address-update">
						<a href="#" class="button button-small btn btn-default" title="Opdater">
							<span>Opdater<i class="glyphicon glyphicon-chevron-right right"></i></span>
						</a>
					</p>
			</div>
		</div>
</div>
</div>

{!! Form::open(['method' => 'POST', 'route' => ['order.store'], 'id' => 'cart-form']) !!}

<input type="hidden" id="form-price" name="price" value="{{session('price')}}" />
<input type="hidden" id="cart-order" name="pre_order" value="{{session('pre_order')}}" />
<div id="cart-hidden-inputs">
@foreach(session('tires') as $tire)
 	<input type="hidden" name="tires[]" value="{{$tire}}" />
@endforeach
</div>

<div class="container order-opc">
	<h2 class="page-heading step-num"><span>2</span>  Vælg ønsket leveringsmetode</h2>
	<div class="order-carrier-content form-box">
		<div class="delivery-options-address">
			<p class="carrier-title"> Vælg forsendelsesmulighed til denne adresse: Min adresse</p>
			<div class="delivery-options">
				<div class="delivery-radio">
					@foreach($delivery as $key => $value)
						@if($key == 0)
						<div class="delivery_option item">
							<table class="resume table table-bordered">
								<tbody>
									<tr>
										<td class="delivery-option-radio">
											<input type="radio" name="delivery" value="{{$key}}" checked />
										</td>
										<td class="delivery-option-logo">
											<img class="order-carrier-logo" src="/quickadmin/images/2.jpg" alt="My carrier">
										</td>
										<td>
											<span>{{ $value }}</span>
										</td>
										<td class="delivery-option-price">
											<div class="delivery-option-price"></div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						@else
						<table class="resume table table-bordered">
							<tbody>
								<tr>
									<td class="delivery-option-radio">
										<input type="radio" name="delivery" value="{{$key}}" />
									</td>
									<td class="delivery-option-logo"></td>
									<td>
										<span>{{ $value }}</span>
									</td>
									<td class="delivery-option-price">
										<div class="delivery-option-price"></div>
									</td>
								</tr>
							</tbody>
						</table>
						@endif
					@endforeach
				</div>
			</div>
			<hr>
			<div class="form-box">
				<div class="checkbox">
					<div class="checker">
						<input type="checkbox" value="0" class="checkbox-confirmation" name="isConfirmed" id="isConfirmed">
					</div>
					<label for="isConfirmed">I confrim this order.</label>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container order-opc">
	<h2 class="page-heading step-num"><span>3</span>  Vælg ønsket betalingsmetode</h2>
	{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-success btn-lg', 'id' => 'btn-confirm-form']) !!}

</div>

{!! Form::close() !!}

@endsection
