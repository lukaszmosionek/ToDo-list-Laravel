@if (session()->has('success'))
    <div class="mb-3 text-center mt-6">
        <div class="bg-green-500 text-white rounded-md p-3">
            {!! session('success') !!}
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="mb-3 text-center mt-6">
        <div class="bg-red-500 text-white rounded-md p-3">
            {!! session('error') !!}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="mb-3 text-center mt-6">
        <div class="bg-red-500 text-white rounded-md p-3">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
