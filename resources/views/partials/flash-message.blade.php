@if ($message = Session::pull('success'))

    <div class="bg-green-200 p-2 m-5">
        <strong class="text-center">{{ $message }}</strong>
    </div>

@endif

@if ($message = Session::pull('error'))

    <div class="bg-red-200 p-2 m-5">
        <strong>{{ $message }}</strong>
    </div>

@endif

@if ($errors->any())

    <div class="bg-green-200 p-2 m-5">
        Please check the form below for errors
    </div>

@endif
