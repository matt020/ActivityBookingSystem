<div>
    <select wire:model.live="selectedType" class="border p-2 rounded">
        <option value="">-- Select Activity Type --</option>
        @foreach ($activityTypes as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select>

    <ul>
        @foreach ($activities as $activity)
            <li>{{ $activity->name }}</li>
        @endforeach
    </ul>
</div>
</div>
