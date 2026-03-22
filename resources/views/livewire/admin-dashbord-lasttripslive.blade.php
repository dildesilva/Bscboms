  <div wire:poll.2s class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg rounded-lg sm:rounded-xl shadow-sm border border-white/20 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-md">
      <div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-white/20 dark:border-gray-700 bg-blue-50/50 dark:bg-blue-900/20 backdrop-blur-sm">
          <h2 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-white flex items-center">
              <i class="bi bi-activity text-blue-500 mr-2"></i>
              Latest Completed Trips
          </h2>
      </div>
      <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-white/20 dark:divide-gray-700">
              <thead class="bg-gray-50/50 dark:bg-gray-700/50 backdrop-blur-sm">
                  <tr>
                      <th scope="col" class="px-4 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Boat</th>
                      <th scope="col" class="px-4 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Departure</th>
                      <th scope="col" class="px-4 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Duration</th>
                      <th scope="col" class="px-4 sm:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Emergency</th>
                      <th scope="col" class="px-4 sm:px-6 py-2 sm:py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Time</th>
                  </tr>
              </thead>
              <tbody class="bg-white/30 dark:bg-gray-800/30 divide-y divide-white/20 dark:divide-gray-700">
                  @forelse ($latast as $data)
                  <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition-colors duration-150">
                      <td class="px-4 sm:px-6 py-3 whitespace-nowrap">
                          <div class="flex items-center">
                              <div class="flex-shrink-0 h-8 w-8 sm:h-10 sm:w-10 bg-blue-100/50 dark:bg-blue-900/30 rounded-full flex items-center justify-center backdrop-blur-sm">
                                  <i class="bi bi-boat text-blue-600 dark:text-blue-400 text-sm sm:text-base">
                            <img src="{{ asset('storage/profiles/' . $data->user->accountDP) }}" alt="Boat" class="h-8 w-8 object-cover rounded-full">

                                  </i>
                              </div>
                              <div class="ml-2 sm:ml-4">
                                  <div class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white truncate max-w-[100px] sm:max-w-none">{{ $data->boat }}</div>
                                  <div class="text-xs text-gray-500 dark:text-gray-400">TRP-{{ $data->id }}</div>
                              </div>
                          </div>
                      </td>
                      <td class="px-4 sm:px-6 py-3 whitespace-nowrap">
                          <div class="text-xs sm:text-sm text-gray-900 dark:text-white">{{ $data->updated_at }}</div>
                          <div class="text-xs text-gray-500 dark:text-gray-400 truncate max-w-[80px] sm:max-w-none">{{ $data->status }}</div>
                      </td>
                      <td class="px-4 sm:px-6 py-3 whitespace-nowrap text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                          {{ \Carbon\Carbon::parse($data->updated_at)->diffForHumans(\Carbon\Carbon::parse($data->departureTime)) }}

                      </td>
                      <td class="px-4 sm:px-6 py-3 whitespace-nowrap">
                          <span class="px-2 inline-flex text-2xs sm:text-xs leading-5 font-semibold rounded-full bg-gray-100/50 dark:bg-gray-700/50 text-gray-800 dark:text-gray-300 backdrop-blur-sm">
                              {{$data->emergency}}
                          </span>
                      </td>
                      <td class="px-4 sm:px-6 py-3 whitespace-nowrap text-right text-xs sm:text-sm font-medium">
                          <span class="px-2 inline-flex text-2xs sm:text-xs leading-5 font-semibold rounded-full bg-gray-100/50 dark:bg-gray-700/50 text-gray-800 dark:text-gray-300 backdrop-blur-sm">
                              {{ $data->updated_at->diffForHumans() }}
                          </span>
                      </td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="5" class="px-4 sm:px-6 py-4 text-center text-xs sm:text-sm text-gray-500 dark:text-gray-400">No completed trips available</td>
                  </tr>
                  @endforelse
              </tbody>
          </table>
      </div>
  </div>
