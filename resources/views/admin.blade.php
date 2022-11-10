@extends('layouts.main')
@section('content')
    <div><h1 class="text-center text-xl">Admin Panel</h1></div><br>
    @include('includes.flash-message')
    <div class="flex flex-row justify-center items-top">
        <a href="{{route('products.create')}}">
            <button
                class="text-l w-40 bg-green-400 hover:border-green-900 text-white font-bold p-2 mx-5 border-2 rounded">
                Create Product
            </button>
        </a>
        <a href="{{route('services.create')}}">
            <button
                class="text-l w-40 bg-green-400 hover:border-green-900 text-white font-bold p-2 mx-5 border-2 rounded">
                Create Service
            </button>
        </a>
    </div>
    <div class="flex flex-row justify-center items-top">

        <div class="px-5 bg-gray-100">

            <table class="text-center align-center border border-2">
                <tr class="border border-2 bg-gray-300">
                    <th class="px-3 border border-1">Product Id</th>
                    <th class="px-3 border border-1">Product name</th>
                    <th class="px-3 border border-1">Manufacturer</th>
                    <th class="px-3 border border-1">Category</th>
                    <th class="px-3 border border-1">Price</th>
                    <th class="px-3 border border-1"></th>
                </tr>
                @foreach($products as $product)
                    <tr class="border border-1">
                        <td class="border border-1 px-3">{{$product->id}}</td>
                        <td class="border border-1 px-3">{{$product->name}}</td>
                        <td class="border border-1 px-3">{{$product->manufacturer}}</td>
                        <td class="border border-1 px-3">{{$product->category}}</td>
                        <td class="border border-1 px-3">${{$product->cost}}</td>
                        <td>
                            <a href="{{route('product.edit', $product->id)}}">
                                <button
                                    class="text-xs w-12 bg-green-400 hover:border-green-900 text-white font-bold py-1 border-2 rounded">
                                    Edit
                                </button>
                            </a>
                            <form action="{{route('products.delete', $product->id)}}" method="post">
                                @method('DELETE')
                                @csrf

                                <input type="submit"
                                       class="text-xs w-12 bg-red-400 cursor-pointer hover:border-red-900 text-white font-bold py-1 border-2 rounded"
                                       value="Delete">

                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
        <div class="px-5 bg-green-100">

            <table class="text-center align-center border border-2">
                <tr class="border border-2 bg-gray-300">
                    <th class="px-3 border border-1">Service Id</th>
                    <th class="px-3 border border-1">Type</th>
                    <th class="px-3 border border-1">Cost</th>
                    <th class="px-3 border border-1">Deadline</th>
                    <th class="px-3 border border-1">Category</th>
                    <th class="px-3 border border-1"></th>
                </tr>
                @foreach($services as $service)
                    <tr class="border border-1">
                        <td class="border border-1 px-3">{{$service->id}}</td>
                        <td class="border border-1 px-3">{{$service->type}}</td>
                        <td class="border border-1 px-3">{{$service->cost}}</td>
                        <td class="border border-1 px-3">{{$service->deadline}}</td>
                        <td class="border border-1 px-3">{{$service->category}}</td>
                        <td>
                            <a href="{{route('service.edit', $service->id)}}">
                                <button
                                    class="text-xs w-12 bg-green-400 hover:border-green-900 text-white font-bold py-1 border-2 rounded">
                                    Edit
                                </button>
                            </a>
                            <form action="{{route('services.delete', $service->id)}}" method="post">
                                @method('DELETE')
                                @csrf

                                <input type="submit"
                                       class="text-xs w-12 bg-red-400 cursor-pointer hover:border-red-900 text-white font-bold py-1 border-2 rounded"
                                       value="Delete">

                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
