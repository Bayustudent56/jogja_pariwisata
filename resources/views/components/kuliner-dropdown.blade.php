<div class="relative inline-block text-left" x-data="{ open: false }">
    <button @click="open = !open"
        class="inline-flex justify-between items-center w-full rounded-lg bg-white px-4 py-2 text-sm font-bold text-black shadow"
    >
        Kuliner
        <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div x-show="open" @click.outside="open = false"
        x-transition
        class="absolute z-10 mt-2 w-40 rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
    >
        <a href="#berat" class="block px-4 py-2 text-center font-bold text-black hover:bg-gray-100 rounded-t-xl">
            Berat
        </a>
        <a href="#ringan" class="block px-4 py-2 text-center font-bold text-black hover:bg-gray-100 rounded-b-xl">
            Ringan
        </a>
    </div>
</div>
