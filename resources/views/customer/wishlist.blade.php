<x-guest-layout>
    <!-- breadcrum -->
    <div class="py-4 container flex gap-3 items-center">
        <a href="index.html" class="text-primary text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
        <p class="text-gray-600 font-medium uppercase">My Account</p>
    </div>
    <!-- breadcrum end -->

    <!-- account wrapper -->
    <div class="container lg:grid grid-cols-12 items-start gap-6 pt-4 pb-16">
        <!-- sidebar -->
        @livewire('account-sidebar')
        <!-- sidebar end -->

        <!-- account content -->
        <div class="col-span-9 mt-6 lg:mt-0 space-y-4">
            <!-- single wishlist -->
            <div
                class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap">
                <!-- cart image -->
                <div class="w-28 flex-shrink-0">
                    <img src="images/products/product9.jpg"  class="w-full">
                </div>
                <!-- cart image end -->
                <!-- cart content -->
                <div class="md:w-1/3 w-full">
                    <h2 class="text-gray-800 mb-1 xl:text-xl textl-lg font-medium uppercase">
                        Italian L Shape Sofa
                    </h2>
                    <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">In Stock</span></p>
                </div>
                <!-- cart content end -->
                <div class="">
                    <p class="text-primary text-lg font-semibold">$320.00</p>
                </div>
                <a href="#"
                    class="ml-auto md:ml-0 block px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">
                    Add to cart
                </a>
                <div class="text-gray-600 hover:text-primary cursor-pointer">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
            <!-- single wishlist end -->
            <!-- single wishlist -->
            <div
                class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap">
                <!-- cart image -->
                <div class="w-28 flex-shrink-0">
                    <img src="images/products/product9.jpg"  class="w-full">
                </div>
                <!-- cart image end -->
                <!-- cart content -->
                <div class="md:w-1/3 w-full">
                    <h2 class="text-gray-800 mb-1 xl:text-xl textl-lg font-medium uppercase">
                        Italian L Shape Sofa
                    </h2>
                    <p class="text-gray-500 text-sm">Availability: <span class="text-red-600">Out of Stock</span></p>
                </div>
                <!-- cart content end -->
                <div class="">
                    <p class="text-primary text-lg font-semibold">$320.00</p>
                </div>
                <a href="#"
                    class="ml-auto md:ml-0 block px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded
                    uppercase font-roboto font-medium cursor-not-allowed bg-opacity-80">
                    Add to cart
                </a>
                <div class="text-gray-600 hover:text-primary cursor-pointer">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
            <!-- single wishlist end -->
        </div>
        <!-- account content end -->
    </div>
    <!-- account wrapper end -->
</x-guest-layout>
