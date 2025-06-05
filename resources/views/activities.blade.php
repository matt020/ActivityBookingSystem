<x-layouts.primary>
    <ul>
        @foreach ($activities as $activity)
            <li>{{ $activity->name }}</li>
        @endforeach
    </ul>
</x-layouts.primary>