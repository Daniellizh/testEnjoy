<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('update-category', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" value="{{ $category->description }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label">Add image</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
                            <img src="/images/{{ $category->image }}" width="150px">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>