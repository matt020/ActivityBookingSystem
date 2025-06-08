<x-dynamic-component :component="$layout">
    <div class="flex gap-4 justify-center w-full">
        @foreach ($activityTypes as $activityType)
        <a class="flex-1 p-6 bg-white shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] text-center flex flex-col items-center" 
            href="{{ Request::is('dashboard*') ? route('dashboard.activities', ['type' => $activityType->id]) : route('activities', ['type' => $activityType->id]) }}">
            @if ($activityType->image_path)
                <img class="mb-6 w-32" src="{{ asset('storage' . $activityType->image_path) }}" alt="{{ $activityType->name }}">
            @endif
            <flux:heading>{{ $activityType->name }}</flux:heading>
        </a>
        @endforeach
    </div>
</x-dynamic-component>