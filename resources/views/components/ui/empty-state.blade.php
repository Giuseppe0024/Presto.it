@props(['fixed' => false])

<div class="card bg-secondary-subtle border-0 rounded-4 overflow-hidden {{ $fixed ? 'flex-shrink-0' : '' }}"
     @if ($fixed) style="width: 280px;" @endif>
    <div class="card-body">
        <p class="text-muted mb-0">Oops! <br> {{ $slot }}</p>
    </div>
</div>
