<!DOCTYPE html>

<html>

<head>

    <title>Laravel Product Catalog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

<div class="container">
    <div><h1 class="text-center text-xl">Admin Panel</h1></div>
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
                                    <a href="/product/{{$product->id}}/edit">
                                        <button class="text-xs w-12 bg-green-400 hover:border-green-900 text-white font-bold py-1 border-2 rounded">
                                            Edit
                                        </button>
                                    </a>
                                    <form action="/products/{{$product->id}}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-xs w-12 bg-red-400 hover:border-red-900 text-white font-bold py-1 border-2 rounded">
                                            Delete
                                        </button>

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
                                    <a href="/service/{{$service->id}}/edit">
                                        <button class="text-xs w-12 bg-green-400 hover:border-green-900 text-white font-bold py-1 border-2 rounded">
                                            Edit
                                        </button>
                                    </a>
                                    <form action="/services/{{$service->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs w-12 bg-red-400 hover:border-red-900 text-white font-bold py-1 border-2 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
        </div>
</div>

</body>

</html>
