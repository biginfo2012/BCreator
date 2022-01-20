@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>

        <ul class="mt-0 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
