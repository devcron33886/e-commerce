@component('mail::message')

Hello,

Your order #{{ $order->id }} has been placed.

Please go to your dashboard to see your orders stastus.

@component('mail::button', ['url' => '/orders'])
View your order (s)
@endcomponent

Thanks,<br>
{{ config('app.name'),' Team' }}
@endcomponent
