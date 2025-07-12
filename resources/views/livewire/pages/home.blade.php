@extends('components.layout.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-orange-50 to-white">
        <div class="max-w-6xl mx-auto px-4 py-12 md:py-24">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        Step Into
                        <span class="text-orange-600">Style</span>
                    </h1>
                    <p class="text-gray-600 mb-6">
                        Premium footwear crafted for comfort and designed
                        for fashion-forward individuals.
                    </p>
                    <button
                        class="bg-orange-600 hover:bg-orange-700 text-white font-medium py-2 px-6 rounded-full transition duration-300">
                        Shop Collection
                    </button>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('assets/image/close-up-runner-shoes-with-red-laces.jpg') }}"
                        alt="Hero image showing premium leather shoes on a wooden background with orange accents"
                        class="w-full rounded-lg shadow-xl object-cover" />
                </div>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    Discover by Category
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Find the perfect pair that matches your style and
                    personality.
                </p>
            </div>

            <!-- Category Selector -->
            <div class="flex flex-wrap justify-center gap-2 mb-8">
                <button @click="selectedCategory = 'all'"
                    :class="{ 'bg-orange-600 text-white': selectedCategory === 'all', 'bg-gray-100 text-gray-700 hover:bg-gray-200': selectedCategory !== 'all' }"
                    class="px-4 py-2 rounded-full font-medium transition duration-300">
                    All
                </button>
                <button @click="selectedCategory = 'sneakers'"
                    :class="{ 'bg-orange-600 text-white': selectedCategory === 'sneakers', 'bg-gray-100 text-gray-700 hover:bg-gray-200': selectedCategory !== 'sneakers' }"
                    class="px-4 py-2 rounded-full font-medium transition duration-300">
                    Sneakers
                </button>
                <button @click="selectedCategory = 'running'"
                    :class="{ 'bg-orange-600 text-white': selectedCategory === 'running', 'bg-gray-100 text-gray-700 hover:bg-gray-200': selectedCategory !== 'running' }"
                    class="px-4 py-2 rounded-full font-medium transition duration-300">
                    Running
                </button>
                <button @click="selectedCategory = 'casual'"
                    :class="{ 'bg-orange-600 text-white': selectedCategory === 'casual', 'bg-gray-100 text-gray-700 hover:bg-gray-200': selectedCategory !== 'casual' }"
                    class="px-4 py-2 rounded-full font-medium transition duration-300">
                    Casual
                </button>
                <button @click="selectedCategory = 'formal'"
                    :class="{ 'bg-orange-600 text-white': selectedCategory === 'formal', 'bg-gray-100 text-gray-700 hover:bg-gray-200': selectedCategory !== 'formal' }"
                    class="px-4 py-2 rounded-full font-medium transition duration-300">
                    Formal
                </button>
            </div>

            <!-- Products grid filtered by selected category -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product 1 - Visible in all and sneakers -->
                <div x-show="selectedCategory === 'all' || selectedCategory === 'sneakers'"
                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="White and orange premium sneakers with unique patterns and comfortable sole"
                            class="w-full h-64 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            New
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Urban Velocity
                        </h3>
                        <p class="text-gray-600 mb-2">Premium Sneakers</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">$129.99</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 - Visible in all and running -->
                <div x-show="selectedCategory === 'all' || selectedCategory === 'running'"
                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Lightweight running shoes with breathable mesh and shock absorption technology"
                            class="w-full h-64 object-cover" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">Speed Pulse</h3>
                        <p class="text-gray-600 mb-2">Running Shoes</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">$149.99</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 - Visible in all and casual -->
                <div x-show="selectedCategory === 'all' || selectedCategory === 'casual'"
                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Brown leather casual shoes with comfortable insole and stylish design"
                            class="w-full h-64 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            Sale
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Weekend Explorer
                        </h3>
                        <p class="text-gray-600 mb-2">Casual Shoes</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-orange-600">$89.99</span>
                                <span class="text-sm text-gray-500 line-through ml-2">$119.99</span>
                            </div>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 - Visible in all and formal -->
                <div x-show="selectedCategory === 'all' || selectedCategory === 'formal'"
                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Black leather formal shoes with polished finish and comfortable fit"
                            class="w-full h-64 object-cover" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Executive Bond
                        </h3>
                        <p class="text-gray-600 mb-2">Formal Shoes</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">$159.99</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 5 - Visible in all and sneakers -->
                <div x-show="selectedCategory === 'all' || selectedCategory === 'sneakers'"
                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Limited edition orange and black sneakers with unique patterns"
                            class="w-full h-64 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            Limited
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">Neon Rush</h3>
                        <p class="text-gray-600 mb-2">Limited Sneakers</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">$179.99</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 - Visible in all and running -->
                <div x-show="selectedCategory === 'all' || selectedCategory === 'running'"
                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Professional running shoes with advanced shock absorption and breathable upper"
                            class="w-full h-64 object-cover" />
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Endurance Pro
                        </h3>
                        <p class="text-gray-600 mb-2">Running Shoes</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">$139.99</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button
                    class="border border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white font-medium py-2 px-6 rounded-full transition duration-300">
                    View All Products
                </button>
            </div>
        </div>
    </section>

    <!-- Newest Arrivals Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    New Arrivals
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Fresh styles just arrived in our collection.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- New Arrival 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Brand new white and gray running shoes with innovative sole design"
                            class="w-full h-48 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            New
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">Aero Glide</h3>
                        <p class="text-gray-600 mb-2">Running Shoes</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">$169.99</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- New Arrival 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Modern minimalist sneakers in muted tones with premium materials"
                            class="w-full h-48 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            New
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Urban Minimal
                        </h3>
                        <p class="text-gray-600 mb-2">Sneakers</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">$139.99</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- New Arrival 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Lightweight summer shoes with breathable fabric and flexible sole"
                            class="w-full h-48 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            New
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Summer Breeze
                        </h3>
                        <p class="text-gray-600 mb-2">Casual Shoes</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">$99.99</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- New Arrival 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Elegant dark brown leather shoes with sophisticated stitching details"
                            class="w-full h-48 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            New
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Gentleman's Choice
                        </h3>
                        <p class="text-gray-600 mb-2">Formal Shoes</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">$179.99</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
