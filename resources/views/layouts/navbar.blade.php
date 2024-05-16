<div class="navbar-start px-3">
    <button
        class="text-white inline-flex items-center bg-warning-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        onclick="my_modal_3.showModal()">+ Add Post</button>
    <!-- Reduced height -->

</div>
<div class="navbar-center hidden lg:flex text-3xl font-semibold cursor-pointer"><a href="/">
        <span class="text-primary">S</span>ocial<span class="text-secondary">M</span>ate
    </a>
</div>

<!-- nav-end-menu -->
<div class="navbar-end py-2">
    <!-- Search -->
    <div class="form-control">
        <input type="search" placeholder="Search" id="searchData" name="search"
            class="input input-bordered input-info w-full max-w-xs h-10" />
    </div>
    <!-- search button -->
    <button class="btn btn-ghost btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>
    <!-- theme -->
    <label class="swap swap-rotate px-1">

        <!-- this hidden checkbox controls the state -->
        <input type="checkbox" class="theme-controller" value="synthwave" />

        <!-- sun icon -->
        <svg class="swap-off fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 24">
            <path
                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
        </svg>

        <!-- moon icon -->
        <svg class="swap-on fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 24">
            <path
                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
        </svg>

    </label>
    <!-- notification -->
    <div class="flex-none px-3">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item">8</span>
                </div>
            </div>
            <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                <div class="card-body">
                    <span class="font-bold text-lg">Your notifications</span>
                    <span class="text-info">Subtotal: $999</span>
                    <div class="card-actions"><a href="Views/chat.view.php">
                            <button class="btn btn-primary btn-block">View all</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <button type='button' class='btn btn-outline btn-accent text-md py-1 px-5 h-7 font-semibold'>Login</button></a> -->
    <a href='{{ route('logout') }}'>
        <button type='button'
            class='text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800'>Logout</button></a>
    <!-- Profile -->
    <div class="dropdown dropdown-end px-4">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <img src="" class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto"
                alt="Profile Image" />
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
            <li>
                <a>
                    <!-- <a class="justify-between"> -->
                    Profile
                    <!-- <span class="badge">New</span> -->
                </a>
            </li>
            <li><a>Settings</a></li>
            <li><a>Logout</a></li>
        </ul>
    </div>
    <!-- Main modal -->
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Upload your post</h3>
            <form class="p-4 md:p-5" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <!-- <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label> -->
                        <input type="file" name="imageFile"
                            class="file-input file-input-bordered file-input-primary w-full file-input-sm max-w-xs" />
                    </div>
                    <div class="col-span-2">
                        <textarea id="description" rows="4" name="captionText"
                            class="textarea textarea-primary block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-blue-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="What's on your mind!!!"></textarea>
                    </div>
                </div>
                <button type="submit" name="post"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Post
                </button>
            </form>
        </div>
    </dialog>
</div>
