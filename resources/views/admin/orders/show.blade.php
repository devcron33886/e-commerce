@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="text-center text-md"> {{ $order->series->name ?? '' }}-{{ str_pad($order->order_number,5,'0',STR_PAD_LEFT) }} Details</h4>
    </div>

    <div class="card-body">


        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        Order No
                    </th>
                    <th>Client Name</th>
                    <th>Client Mobile</th>
                    <th>Client Address</th>
                    <th>Payment Mode</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $order->series->name ?? '' }}-{{ str_pad($order->order_number,5,'0',STR_PAD_LEFT) }}
                    </td>
                    <td>{{ $order->user->name ?? '' }}</td>
                    <td>{{ $order->shippingAddress->mobile ?? '' }}</td>
                    <td>{{ $order->shippingAddress->address ?? '' }}</td>
                    <td>{{ $order->paymentMethod->name ?? '' }}</td>
                </tr>
            </tbody>

        </table>


    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="text-center"> {{ $order->series->name ?? '' }}-{{ str_pad($order->order_number,5,'0',STR_PAD_LEFT) }} Items</h4>
    </div>

    <div class="card-body">


        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        Item
                    </th>
                    <th>Quantity</th>
                    <th>Price/Unit</th>
                    <th>Subtotal</th>

                </tr>

            </thead>
            <tbody>
                @foreach($order->variations as $variation)
                    <tr>
                        <td>
                            {{ $variation->product->name }}
                        </td>
                        <td>{{ $variation->pivot->quantity }}</td>
                        <td>{{ $variation->formattedPrice() ?? '' }} /  {{ $variation->type}}</td>
                        <td>RWF {{ number_format($variation->price * $variation->pivot->quantity) }}</td>

                    </tr>
                @endforeach
                <tr>
                    <td>
                        Message
                    </td>
                    <td colspan="3">
                        {{ $order->notes }}
                    </td>
                </tr>

                <tr><td colspan="3">Shipping Cost ({{ $order->shippingtype->title }})</td>

                    <td>RWF {{ number_format($order->shippingtype->price) }}</td></tr>
                    <tr><td colspan="3">Total</td>

                    <td>RWF {{ number_format($order->subtotal) }}</td></tr>
            </tbody>

        </table>


    </div>
</div>



@endsection
