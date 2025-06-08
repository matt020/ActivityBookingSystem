<div>
    @unless($isBookingsPage)
        <flux:select wire:model.live="selectedType" placeholder="Select Activity Type" label="Activity Type">
            <flux:select.option value="">All</flux:select.option>
            @foreach ($activityTypes as $type)
                <flux:select.option value="{{ $type->id }}">{{ $type->name }}</flux:select.option>
            @endforeach
        </flux:select>
    @endunless
    
    <div class="mt-6">
        @if($activities->isEmpty() && auth()->check() && $isBookingsPage)
            <div class="text-center py-12">
                <span class="text-gray-500">
                    You haven't booked any activities yet.
                </span>
            </div>
        @endif
        @foreach ($activities as $activity)
        <div class="mb-6 p-6 shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)]">
            <div class="flex items-center justify-between">
                <flux:heading>{{ $activity->name }}</flux:heading>
                @if(!$isDashboard)
                    <flux:button 
                        href="{{ route('dashboard') }}"
                        color="emerald"
                        icon="arrow-right"
                    >
                        Login to Book Activity
                    </flux:button>
                @else
                    @auth
                        @if($isBookingsPage && $activity->users->contains(auth()->user()))
                            <flux:button 
                                wire:click="cancelBooking({{ $activity->id }})" 
                                color="red"
                                icon="x-mark"
                            >
                                Cancel Booking
                            </flux:button>
                        @elseif(!$isBookingsPage)
                            @if($activity->users->contains(auth()->user()))
                                <span class="text-sm text-gray-500 italic">
                                    You are already booked on this activity
                                </span>
                            @else
                                <flux:button 
                                    wire:click="bookActivity({{ $activity->id }})" 
                                    color="emerald"
                                    icon="check"
                                >
                                    Book Activity
                                </flux:button>
                            @endif
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
