<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @foreach($convo as $convoItem)
        <p style="padding: 10px;background-color: #eee;margin: 20px;border-radius: 5px;">{{ $convoItem['username'] }}: {{ $convoItem['message']  }}</p>
    @endforeach

    <form wire:submit="submitMessage">
        <x-text-input wire:model="message" />
        <button type="submit">Save</button>
    </form>
</div>
