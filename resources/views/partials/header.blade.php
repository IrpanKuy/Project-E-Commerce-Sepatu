<nav x-data="{ mobileMenuOpen: false }" class="bg-white shadow-md">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <span class="text-xl font-bold text-orange-600">STEPSTYLE</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="#" class="text-gray-900 hover:text-orange-600 px-3 py-2 text-sm font-medium">Home</a>
                <a href="#" class="text-gray-500 hover:text-orange-600 px-3 py-2 text-sm font-medium">Shop</a>
                <a href="#"
                    class="text-gray-500 hover:text-orange-600 px-3 py-2 text-sm font-medium">Collections</a>
                <a href="#" class="text-gray-500 hover:text-orange-600 px-3 py-2 text-sm font-medium">About</a>
                <a href="#" class="text-gray-500 hover:text-orange-600 px-3 py-2 text-sm font-medium">Contact</a>
            </div>

            <!-- Icons -->
            <div class="hidden md:flex items-center space-x-4">
                <button class="p-2 rounded-full text-gray-500 hover:text-orange-600 focus:outline-none">
                    <i class="fas fa-search"></i>
                </button>
                <button class="p-2 rounded-full text-gray-500 hover:text-orange-600 focus:outline-none">
                    <i class="fas fa-user"></i>
                </button>
                <button class="p-2 rounded-full text-gray-500 hover:text-orange-600 focus:outline-none">
                    <i class="fas fa-shopping-bag"></i>
                    <span
                        class="absolute top-2 right-2 bg-orange-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </button>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="text-gray-500 hover:text-orange-600 focus:outline-none">
                    <template x-if="!mobileMenuOpen">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </template>
                    <template x-if="mobileMenuOpen">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </template>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition transform duration-300"
        x-transition:enter-start="translate-x-[-100%]" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-[-100%]" @click.away="mobileMenuOpen = false"
        class="md:hidden fixed top-0 left-0 w-64 h-full bg-white shadow-lg z-50" style="display: none;">
        <div class="px-4 pt-4 pb-3 border-b border-gray-200">
            <span class="text-xl font-bold text-orange-600">STEPSTYLE</span>
        </div>
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-900 hover:text-orange-600">Home</a>
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-500 hover:text-orange-600">Shop</a>
            <a href="#"
                class="block px-3 py-2 text-base font-medium text-gray-500 hover:text-orange-600">Collections</a>
            <a href="#"
                class="block px-3 py-2 text-base font-medium text-gray-500 hover:text-orange-600">About</a>
            <a href="#"
                class="block px-3 py-2 text-base font-medium text-gray-500 hover:text-orange-600">Contact</a>
            <div class="flex space-x-4 px-3 py-2">
                <button class="p-2 rounded-full text-gray-500 hover:text-orange-600 focus:outline-none">
                    <i class="fas fa-search"></i>
                </button>
                <button class="p-2 rounded-full text-gray-500 hover:text-orange-600 focus:outline-none">
                    <i class="fas fa-user"></i>
                </button>
                <button class="p-2 rounded-full text-gray-500 hover:text-orange-600 focus:outline-none">
                    <i class="fas fa-shopping-bag"></i>
                    <span
                        class="absolute top-2 right-2 bg-orange-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </button>
            </div>
        </div>
    </div>
</nav>
