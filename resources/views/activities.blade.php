@auth
    <x-layouts.app :title="__('Activities')">
        <livewire:activity-filter :type="$selectedType"/>
    </x-layouts.app>
@else
    <x-layouts.primary>
        <livewire:activity-filter :type="$selectedType"/>
    </x-layouts.primary>
@endauth