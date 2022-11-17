@extends('layouts.main')
@section('content')

    <div class="grid h-top place-items-center">
        <p class="text-lg font-semibold mb-5">Create service</p>
        <form  method="post" action="{{ route('services.store') }}" novalidate
               class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-2">
                <label class="font-semibold">Type </label><br>
                <input type="text" class="border @error('type')  border-pink-500 @enderror" name="type"
                       id="type">
                @error('type')
                <span class="text-pink-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="font-semibold">Deadline </label><br>
                <input type="text" class="border @error('deadline')  border-pink-500 @enderror "
                       name="deadline" id="deadline">
                @error('deadline')
                <span class="text-pink-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="font-semibold">Cost </label><br>
                <input type="text" class="border @error('cost')  border-pink-500 @enderror "
                       name="cost" id="cost">
                @error('cost')
                <span class="text-pink-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="font-semibold">Category </label><br>
                <input type="text" class="border @error('category')  border-pink-500 @enderror "
                       name="category" id="category">
                @error('category')
                <span class="text-pink-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <input type="submit" name="send" value="Submit" class="bg-blue-500 hover:border-blue-900 text-white font-bold py-2 w-44 border-2 rounded">
            </div>
        </form>
    </div>

@endsection
