<div>
    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Boat</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tel </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Est. Return</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Days Out</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Trip ID</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ( $activeuser as $data )
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center">
                                <i class="bi bi-person text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $data->user->name ?? 'It’s not verified yet' }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Emp: {{ $data->tripmemberdetiles->employer_number ?? 'It’s not verified yet'}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-white">{{ $data->tripcreatemodel->boat ?? 'It’s not verified yet'}}</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($data->tripcreatemodel->departureTime)->format('F d, Y') ?? 'N/A'}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-white"> Personal : {{ $data->user->contactnumber}}</div>
                        <div class="text-sm text-[#972424]">Emergency : {{ $data->tripmemberdetiles->phone_number ?? 'It’s not verified yet' }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($data->tripcreatemodel->plannedArrivalTime)->format('F d, Y') ?? 'N/A' }}
                        </div>

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                            {{ \Carbon\Carbon::parse($data->tripcreatemodel->departureTime)->diffForHumans() ?? 'N/A'}}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                            #{{ $data->tripcreatemodel->id ?? 'It’s not verified yet' }}
                        </span>
                    </td>
                </tr>
                @empty
                <h1> no one </h1>
                @endforelse


            </tbody>
        </table>
    </div>
</div>
