<div>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-orange-50 to-white">
        <div class="max-w-6xl mx-auto px-4 py-12 md:py-24">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4">
                        Temukan Gaya Anda
                        <br>
                        <span class="text-orange-600"> Langkah Demi Langkah</span>
                    </h1>
                    <p class="text-gray-600 mb-6">
                        Sepatu premium yang dirancang untuk kenyamanan dan
                        gaya yang modis.
                    </p>
                    <button
                        class="bg-orange-600 hover:bg-orange-700 text-white font-medium py-2 px-6 rounded-full transition duration-300">
                        Belanja Koleksi
                    </button>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('assets/image/close-up-runner-shoes-with-red-laces.jpg') }}"
                        alt="Gambar hero menunjukkan sepatu kulit premium di latar belakang kayu dengan aksen oranye"
                        class="w-full rounded-lg shadow-xl object-cover" />
                </div>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section x-data="{ selectedCategory: 'all' }" class="py-12 bg-white">
        <div class="max-w-6xl minw-full min w-full mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    Temukan Berdasarkan Kategori
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan pasangan sempurna yang sesuai dengan gaya dan
                    kepribadian Anda.
                </p>
            </div>

            <!-- Category Selector -->
            <div class="flex flex-wrap justify-center gap-2 mb-8">
                <div>
                    <input type="radio" id="cat-all" value="all" x-model="selectedCategory" class="sr-only peer">
                    <label for="cat-all"
                        class="px-4 py-2 rounded-full font-medium transition duration-300 peer-checked:bg-orange-600 peer-checked:text-white bg-gray-100 text-gray-700 hover:bg-gray-200 ">
                        All
                    </label>
                </div>

                @foreach ($categories as $category)
                    <div>
                        <input type="radio" id="cat-{{ $category->id }}" value="{{ $category->id }}"
                            x-model="selectedCategory" class="sr-only peer">
                        <label for="cat-{{ $category->id }}"
                            class="px-4 py-2 rounded-full font-medium transition duration-300 peer-checked:bg-orange-600 peer-checked:text-white bg-gray-100 text-gray-700 hover:bg-gray-200 ">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach

            </div>

            <!-- Products grid filtered by selected category -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product 1 - Visible in all and sneakers -->

                @foreach ($products as $product)
                    <div x-show="selectedCategory === 'all' || selectedCategory === '{{ $product->id }}'"
                        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $product->thumbnail_image) }}" alt="{{ $product->name }}"
                                class="w-full h-64 object-cover" />
                            <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                                Baru
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-1">
                                {{ $product->name }}
                            </h3>
                            <p class="text-gray-600 mb-2">{{ $category->name }}</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-orange-600">Rp
                                    {{ number_format($product->variants_min_price, 0, ',', '.') }}</span>
                                <button class="text-orange-600 hover:text-orange-800">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-12">
                    <button
                        class="border border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white font-medium py-2 px-6 rounded-full transition duration-300">
                        Lihat Semua Produk
                    </button>
                </div>
            </div>
    </section>

    <!-- Newest Arrivals Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    Produk Terbaru
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Gaya baru baru saja tiba di koleksi kami.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- New Arrival 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="https://placehold.co/600x400"
                            alt="Sepatu lari putih dan abu-abu yang baru dengan desain sol inovatif"
                            class="w-full h-48 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            Baru
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">Aero Glide</h3>
                        <p class="text-gray-600 mb-2">Sepatu Lari</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">Rp 2.299.000</span>
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
                            alt="Sneakers minimalis modern dalam nada lembut dengan bahan premium"
                            class="w-full h-48 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            Baru
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Urban Minimal
                        </h3>
                        <p class="text-gray-600 mb-2">Sneakers</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">Rp 1.999.000</span>
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
                            alt="Sepatu musim panas ringan dengan kain yang bernapas dan sol fleksibel"
                            class="w-full h-48 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            Baru
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Summer Breeze
                        </h3>
                        <p class="text-gray-600 mb-2">Sepatu Santai</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">Rp 799.000</span>
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
                            alt="Sepatu kulit coklat gelap yang elegan dengan detail jahitan yang canggih"
                            class="w-full h-48 object-cover" />
                        <div class="absolute top-2 right-2 bg-orange-600 text-white text-xs px-2 py-1 rounded-full">
                            Baru
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-1">
                            Pilihan Gentleman
                        </h3>
                        <p class="text-gray-600 mb-2">Sepatu Formal</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-orange-600">Rp 2.599.000</span>
                            <button class="text-orange-600 hover:text-orange-800">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
