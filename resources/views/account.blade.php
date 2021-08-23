<x-guest-layout>
    <!-- breadcrum -->
    <div class="py-4 container flex gap-3 items-center">
        <a href="/" class="text-primary text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
        <p class="text-gray-600 font-medium uppercase">My Account</p>
    </div>
    <!-- breadcrum end -->

    <!-- account wrapper -->
    <div class="container lg:grid grid-cols-12 items-start gap-6 pt-4 pb-16">
        <!-- sidebar -->
        @livewire('account-sidebar', ['menu'=>'account'])
        <!-- sidebar end -->

        <!-- account content -->
        <div class="col-span-9 grid md:grid-cols-3 gap-4 mt-6 lg:mt-0">
            <!-- single card -->
            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex justify-between items center mb-4">
                    <h3 class="font-medium capitalize text-gray-800 text-lg">personal profile</h3>
                    <a href="#" class="text-primary">Edit</a>
                </div>
                <div class="space-y-1">
                    <h4 class="text-gray-700 font-medium">Russell Ahmed</h4>
                    <p class="text-gray-800">example@mail.com</p>
                    <p class="text-gray-800">(123) 456-789</p>
                </div>
            </div>
            <!-- single card end -->
            <!-- single card -->
            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex justify-between items center mb-4">
                    <h3 class="font-medium capitalize text-gray-800 text-lg">Shipping Address</h3>
                    <a href="#" class="text-primary">Edit</a>
                </div>
                <div class="space-y-1">
                    <h4 class="text-gray-700 font-medium">Russell Ahmed</h4>
                    <p class="text-gray-800">3891 Ranchview Dr.</p>
                    <p class="text-gray-800">Richardson, Califora</p>
                    <p class="text-gray-800">(123) 456-789</p>
                </div>
            </div>
            <!-- single card end -->
            <!-- single card -->
            <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex justify-between items center mb-4">
                    <h3 class="font-medium capitalize text-gray-800 text-lg">Billing Address</h3>
                    <a href="#" class="text-primary">Edit</a>
                </div>
                <div class="space-y-1">
                    <h4 class="text-gray-700 font-medium">Russell Ahmed</h4>
                    <p class="text-gray-800">3891 Ranchview Dr.</p>
                    <p class="text-gray-800">Richardson, Califora</p>
                    <p class="text-gray-800">(123) 456-789</p>
                </div>
            </div>
            <!-- single card end -->
        </div>
        <!-- account content end -->
    </div>
    <!-- account wrapper end -->
</x-guest-layout>

