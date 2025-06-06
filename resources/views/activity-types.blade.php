@foreach ($activityTypes as $activityType)
<div class="flex-1 p-6 bg-white shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] text-center">
    <a href="{{ route('activities', ['type' => $activityType->id]) }}">
        <h3 class="font-semibold">{{ $activityType->name }}</h3>
    </a>
</div>
@endforeach