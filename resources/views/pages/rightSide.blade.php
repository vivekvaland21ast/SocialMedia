<!-- follow post -->
<div class="w-1/4"> <!-- 20% width -->
    <!-- Content for the third grid -->
    <!-- Card start -->
    <div class="max-w-sm mx-auto bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg shadow-gray-800">
        <!-- Reduced height -->
        <div class="text-gray-800 dark:text-white py-2 bg-white border-b dark:bg-gray-900 px-4">
            <h2 class="font-bold text-xl">Top Users</h2>
        </div>
        <div class="scrollbar-y-auto scrollbar-hide overflow-auto" style="height: 450px;">
            @if (isset($friend))
                @foreach ($friend as $friends)
                    <div id="list"
                        class="p-2 flex items-center bg-white dark:bg-gray-900 justify-between border-gray-700 border-t cursor-pointer hover:bg-gray-700">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                                src="{{ asset('profile_images/' . $friends->profile->profile) }}"
                                alt="Profile Image" />
                            <div class="ml-2 flex flex-col">
                                <div class="leading-snug text-sm text-gray-200 font-bold">
                                    {{ $friends->profile->full_name }}
                                </div>
                                <div class="leading-snug text-xs text-gray-600">
                                    {{ '@' . $friends->profile->username }}
                                </div>
                            </div>
                        </div>
                        <button
                            class="view-btn h-8 px-5 mr-4 text-sm font-bold text-blue-400 border border-blue-400 rounded-full hover:bg-blue-100 hover:text-black"
                            data-user-id="">
                            Add
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- Card end -->
    </div>
</div>
