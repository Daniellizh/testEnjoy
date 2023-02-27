<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Product</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Post Name</th>
                    <th scope="col">Post office</th>
                    <th scope="col">City</th>
                    <th scope="col">Street</th>
                    <th scope="col">House</th>
                    <th scope="col">Created_at</th>
                </tr>
                </thead>
                @foreach ($orders as $order)
                    <tbody>
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->postName }}</td>
                        <td>{{ $order->postOffice }}</td>
                        <td>{{ $order->postCity }}</td>
                        <td>{{ $order->postStreet }}</td>
                        <td>{{ $order->postBuilder }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>            
</x-app-layout>