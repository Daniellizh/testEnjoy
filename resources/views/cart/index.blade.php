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
                <form action="{{ route('cart.cart-delete', $item->id)}}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach

        <form method="POST" action="{{ route('cart.place-order') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-6 ">
                        <label class="block">
                            <span class="text-gray-700">Select Category</span>
                            <select name="postName" class="block w-full mt-1 rounded-md">
                                <option>Nova Poshta</option>
                                <option>Ukr Poshta</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Post office</label>
                        <input type="text" name="postOffice" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Post city</label>
                        <input type="text" name="postCity" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Post street</label>
                        <input type="text" name="postStreet" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Post builder</label>
                        <input type="texts" name="postBuilder" class="form-control">
                    </div>
                    <button class="btn btn-primary mt-2">Place Order</button>
                </form>
</x-app-layout>