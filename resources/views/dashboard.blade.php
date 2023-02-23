<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                @if(auth()->user()->can('add products'))
                    <a href="{{ route('add-new-product') }}" class="btn btn-success mb-4">Add product</a>
                @endif
                @if(auth()->user()->can('add categories'))
                    <a href="{{ route('add-new-category') }}" class="btn btn-success mb-4">Add Category</a>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card mb-3" style="max-width: 540px;">
                    @foreach ($products as $product)
                    <div class="row g-0 mb-3">
                        <div class="col-md-4">
                            <img src="/images/{{ $product->image }}" class="img-fluid rounded-start" style="width: 18rem;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            @if(auth()->user()->can('edit products'))
                            <a href="{{ route('edit-product', $product->id) }}" class="btn btn-primary">Edit</a>
                            @endif
                            @if(auth()->user()->can('delete products'))
                                <form action="{{ route('delete-product', $product->id)}}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                @endif
                            </div>
                        </div>
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
                        @if(auth()->user()->can('edit categories'))
                            <a href="{{ route('edit-category', $category->id) }}" class="btn btn-primary">Edit</a>
                        @endif
                        @if(auth()->user()->can('delete categories'))
                            <form action="{{ route('delete-category', $category->id)}}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>