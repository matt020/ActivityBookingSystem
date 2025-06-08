<div>
    <flux:select wire:model.live="selectedType" placeholder="Select Activity Type" label="Activity Type">
        <flux:select.option value="">All</flux:select.option>
        @foreach ($activityTypes as $type)
            <flux:select.option value="{{ $type->id }}">{{ $type->name }}</flux:select.option>
        @endforeach
    </flux:select>
    <div class="mt-6">
        @foreach ($activities as $activity)
        <div class="mb-6 p-6 shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)]">
            <flux:heading>{{ $activity->name }}</flux:heading>
        </div>
        @endforeach
    </div>
</div>
