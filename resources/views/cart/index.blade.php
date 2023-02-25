<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        @foreach ($cartItems as $item)
            <div class="cart-item">
                <h2>{{ $item->product->name }}</h2>
                <p>{{ $item->product->description }}</p>
                <p>Quantity: {{ $item->quantity }}</p>
            </div>
        @endforeach

        <form action="{{ route('cart.place-order') }}" method="POST">
            @csrf
            <button type="submit">Place Order</button>
        </form>

</x-app-layout>