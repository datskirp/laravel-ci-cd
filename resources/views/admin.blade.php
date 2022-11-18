@extends('layouts.main')
@section('content')
    <div><h1 class="text-center text-xl">Admin Panel</h1></div><br>
    <div class="flex flex-row justify-center items-top">
        <a href="{{ route('admin.products.index') }}">
            <button
                class="text-l w-40 bg-gray-400 hover:border-gray-900 text-white font-bold p-2 mx-5 border-2 rounded">
                Show Products
            </button>
        </a>
        <a href="{{ route('admin.services.index') }}">
            <button
                class="text-l w-40 bg-gray-400 hover:border-gray-900 text-white font-bold p-2 mx-5 border-2 rounded">
                Show Services
            </button>
        </a>
    </div>
    <div class="flex flex-row justify-center items-top">
        <a href="{{ route('products.create') }}">
            <button
                class="text-l w-40 bg-green-500 hover:border-green-900 text-white font-bold p-2 mx-5 border-2 rounded">
                Create Product
            </button>
        </a>
        <a href="{{ route('services.create') }}">
            <button
                class="text-l w-40 bg-green-500 hover:border-green-900 text-white font-bold p-2 mx-5 border-2 rounded">
                Create Service
            </button>
        </a>
    </div>
@endsection
