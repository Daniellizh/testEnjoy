<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('add-new-product') }}" class="btn btn-success mb-4">Add product</a>
                <a href="{{ route('add-new-category') }}" class="btn btn-success mb-4">Add Category</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    @foreach ($products as $product)
                    <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="{{ route('edit-product', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('delete-product', $product->id)}}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
                <div class="col-sm-6">
                    <div class="card">
                        @foreach ($categories as $category)
                        <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <a href="{{ route('edit-category', $category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('delete-category', $category->id)}}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>