<div>
    <select wire:model="channel_id" class="w-full text-lg rounded">
        <option value=''>Select Channel</option>
        @foreach ($channels as $channel)
        <option wire:key="{{ $loop->index }}" value="{!! $channel->id !!}">{{  $channel->name }} </option>
        @endforeach
    </select>

</div>  