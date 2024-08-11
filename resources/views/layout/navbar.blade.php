<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
                    <img src="/detik.jpg" class="h-8 me-3" alt="Logo" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">DetikCom</span>
                </a>
            </div>
            <div class="relative">
                <button id="user-menu-button"
                    class="flex items-center text-gray-600 dark:text-gray-300 focus:outline-none">
                    <span class="mr-2 font-semibold">{{ Auth::user()->name }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="user-menu"
                    class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 hidden">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
document.getElementById('user-menu-button').addEventListener('click', function() {
    const menu = document.getElementById('user-menu');
    menu.classList.toggle('hidden');
});
</script>