<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('roles.create') }}" class="btn btn-success mb-4">Add Role</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            @foreach ($roles as $role)
                <div class="card-body">
                <h5 class="card-title">{{ $role->name}}</h5>
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('roles.destroy', $role->id)}}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                </div>
            @endforeach
          </div>
    </div>
</x-app-layout>