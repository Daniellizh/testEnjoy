<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        @foreach ($orders as $order)
        @foreach ($users as $user)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
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
                <tbody>
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->id }}</td>
                </tr>
                </tbody>
            </table>            
        @endforeach
        @endforeach

</x-app-layout>