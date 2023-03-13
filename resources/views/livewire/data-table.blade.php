<div class="max-w-7xl mx-auto mt-32">

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">

                <div class="max-w-lg">
                    <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Search</label>
                    <div class="mt-2">
                        <input type="search" name="search" id="search"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="search">
                    </div>
                </div>

            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                <label for="active">active</label>
                <input type="checkbox" wire:model="active" name="active" id="active">
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Title</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status</th>

                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{ $user->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <div class="text-gray-900">{{ $user->email }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <span
                                            class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 text-green-800   {{ $user->active == 1 ? 'bg-green-300' : 'bg-red-300' }}  ">{{ $user->active == 1 ? 'active' : 'deactive' }}</span>
                                    </td>

                                </tr>
                            @endforeach
                            <!-- More people... -->

                        </tbody>
                    </table>
                </div>
                <div class="mt-8">

                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>



</div>
