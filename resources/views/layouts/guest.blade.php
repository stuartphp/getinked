<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>GetInked Tattoo and Piercing Supplies @yield('title')</title>
        <meta name="description" content="@yield('description', 'GetInked Tattoo Supplies, South Africa Number 1 Tattoo and Piercing Supply Specialist. We source the best quality products for the professional tattoo artist.')">
        <meta name="robots" content="index, follow">
        <link rel="canconical" href="{{ request()->fullUrl() }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}?{{ time() }}">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @stack('css')
        @livewireStyles
    </head>
    <body>
        @livewire('navbar')
        {{ $slot }}
<!-- footer -->
<footer class="bg-white pt-16 pb-12 border-t border-gray-100">
    <div class="container">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <!-- footer text -->
            <div class="space-y-8 xl:col-span-1">
                <img class="w-30" src="images/logo.svg" alt="Company name">
                <p class="text-gray-500 text-base">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio facere rem
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <!-- footer text end -->
            <!-- footer links -->
            <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Solutions
                        </h3>
                        <div class="mt-4 space-y-4">
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Marketing
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Analytics
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Commerce
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Insights
                            </a>
                        </div>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Support
                        </h3>
                        <div class="mt-4 space-y-4">
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Pricing
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Documentation
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Guides
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                API Status
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Company
                        </h3>
                        <div class="mt-4 space-y-4">
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                About
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Blog
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Jobs
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Press
                            </a>
                        </div>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Legal
                        </h3>
                        <div class="mt-4 space-y-4">
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Claim
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Privacy
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Policy
                            </a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">
                                Terms
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer links end -->
        </div>
    </div>
</footer>
<!-- footer end -->
<!-- copyright -->
<div class="bg-gray-800 py-4">
    <div class="container flex items-center justify-between">
        <p class="text-white">© RAFCART - All Rights Reserved</p>
        <div>
            <img src="images/methods.png" class="h-5">
        </div>
    </div>
</div>
<!-- copyright end -->

        @stack('modals')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @stack('scripts')
        @livewireScripts
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 2500,
                timerProgressBar:true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            window.addEventListener('alert',({detail:{type,message}})=>{
                Toast.fire({
                    icon:type,
                    title:message
                })
            })

    let menuBar = document.querySelector('#menuBar')
    let mobileMenu = document.querySelector('#mobileMenu')
    let closeMenu = document.querySelector('#closeMenu')

    menuBar.addEventListener('click', function(){
        mobileMenu.classList.remove('hidden')
    })

    closeMenu.addEventListener('click', function(){
        mobileMenu.classList.add('hidden')
    })

        </script>
    </body>
</html>
