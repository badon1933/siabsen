@props(['id'])

<div class="collapse my-2" id="{{ $id }}">
    <div class="card card-body">
        {{ $slot }}
    </div>
</div>
