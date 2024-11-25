@props(['options', 'title', 'name', 'custom' => ''])
<div class="form-floating my-1">
    <select class="form-select" name="{{ $name }}" id="{{ $name }}"
        aria-label="Floating label select example">
        @if ($custom)
            {{ $slot }}
        @else
            <option selected style="display: none">Pilih salah satu {{ $title }}</option>
            @foreach ($options as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        @endif
    </select>
    <label for="floatingSelect">Pilih {{ $title }}</label>
</div>
