@extends('layouts.index')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>ORDREHISTORIK</h1>
          <hr>
          <p>
            Her er de ordrer du har gennemført siden oprettelsen af din konto.
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          @if(count($orders) > 0)
            <table>
                <thead>
                    <tr>
                        <th width="100px">Identifier</th>
                        <th width="100px">Count</th>
                        <th width="100px">Price</th>
                        <th width="100px">Status</th>
                        <th width="100px">Delivery</th>
                    </tr>
                </thead>
                
                <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td width="100px"><a href="{{ action('UsersOrderController@show', $order->id) }}">{{ $order->identifier }}</a></td>
                                <td width="100px">{{ $order->count }}</td>
                                <td width="100px">{{ $order->price }}</td>
                                <td width="100px">{{ $status_labels[$order->status] }}</td>
                                <td>{{ $delivery_labels[$order->delivery_type] }}</td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
          @else
            <p>Du har ikke placeret nogen ordrer.</p>
          @endif
        </div>
      </div>
    </div>
@endsection
