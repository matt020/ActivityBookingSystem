<x-dynamic-component :component="$layout">
    <livewire:activity-filter 
        :type="$selectedType"
        :user="$user ?? null"
    />
</x-dynamic-component>