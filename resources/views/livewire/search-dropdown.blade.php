<div>
    <!-- Search -->
    <div class="mt-20">
        <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Search</label>
        <div class="relative mt-2 flex items-center">
            <input type="text" wire:model.debounce.300ms="search" name="search" id="search"
                class="block w-full rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                <kbd
                    class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">⌘K</kbd>
            </div>
        </div>

        @if (strlen($search) > 2)

            <ul>
                @forelse ($searchResults as $result)
                    <li>

                        <a @if (array_key_exists('trackViewUrl', $result)) href="{{ $result['trackViewUrl'] }}" @else href="#" @endif>
                            <img src="{{ $result['artworkUrl60'] }}" alt="">

                            <div>
                                <div>{{ $result['trackName'] }}</div>
                                <div>{{ $result['artistName'] }}</div>
                            </div>
                        </a>
                    </li>
                @empty
                    <li>No Search result found "{{ $search }}"</li>
                @endforelse
            </ul>
        @endif



    </div>
</div>
