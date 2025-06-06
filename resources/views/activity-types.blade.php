<x-dynamic-component :component="$layout">
    <div class="flex gap-4 justify-center w-full">
        @foreach ($activityTypes as $activityType)
        <a class="flex-1 p-6 bg-white shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] text-center" 
            href="{{ Request::is('dashboard*') 
                ? route('dashboard.activities', ['type' => $activityType->id])
                : route('activities', ['type' => $activityType->id]) }}">
            <flux:text>{{ $activityType->name }}</flux:text>
        </a>
        @endforeach
    </div>
</x-dynamic-component>