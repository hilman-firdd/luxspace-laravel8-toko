@extends('layouts.frontend')

@section('content')

<!-- START: HERO -->
<section class="flex items-center hero">
    <div
        class="w-full absolute z-20 inset-0 md:relative md:w-1/2 text-center flex flex-col justify-center hero-caption">
        <h1 class="text-3xl md:text-5xl leading-tight font-semibold">
            The Room <br class="" />You've Dreaming
        </h1>
        <h2 class="px-8 text-base md:px-0 md:text-lg my-6 tracking-wide">
            Kami menyediakan furniture berkelas yang
            <br class="hidden lg:block" />membuat ruangan terasa homey
        </h2>
        <div>
            <a href="#browse-the-room"
                class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 rounded-full px-8 py-3 mt-4 inline-block flex-none transition duration-200">Explore
                Now</a>
        </div>
    </div>
    <div class="w-full inset-0 md:relative md:w-1/2">
        <div class="relative hero-image">
            <div class="overlay inset-0 bg-black opacity-35 z-10"></div>
            <div class="overlay right-0 bottom-0 md:inset-0">
                <button class="video hero-cta focus:outline-none z-30 modal-trigger" data-content='<div class="w-screen pb-56 md:w-88 md:pb-56 relative z-50">
                <div class="absolute w-full h-full">
                  <iframe
                    width="100%"
                    height="100%"
                    src="https://www.youtube.com/embed/3h0_v1cdUIA"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                  ></iframe>
                </div>
              </div>'></button>
            </div>
            <img src="frontend/images/content/image-section-1.png" alt="hero 1"
                class="absolute inset-0 md:relative w-full h-full object-cover object-center" />
        </div>
    </div>
</section>
<!-- END: HERO -->

<!-- START: BROWSE THE ROOM -->
<section class="flex bg-gray-100 py-16 px-4" id="browse-the-room">
    <div class="container mx-auto">
        <div class="flex flex-start mb-4">
            <h3 class="text-2xl capitalize font-semibold">
                browse the room <br class="" />that we designed for you
            </h3>
        </div>
        <div class="grid grid-rows-2 grid-cols-9 gap-4">
            <div class="relative col-span-9 row-span-1 md:col-span-4 card" style="height: 180px">
                <div class="card-shadow rounded-xl">
                    <img src="frontend/images/content/image-catalog-1.png" alt=""
                        class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                </div>
                <div class="overlay left-0 top-0 bottom-0 flex justify-center flex-col pl-48 md:pl-72">
                    <h5 class="text-lg font-semibold">Living Room</h5>
                    <span class="">18.309 items</span>
                </div>
                <a href="details.html" class="stretched-link">
                    <!-- fake children -->
                </a>
            </div>
            <div class="relative col-span-9 row-span-1 md:col-span-2 md:row-span-2 card">
                <div class="card-shadow rounded-xl">
                    <img src="{{ asset('frontend/images/content/image-catalog-3.png') }}" alt=""
                        class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                </div>
                <div
                    class="overlay right-0 left-0 top-0 bottom-0 md:bottom-auto flex justify-center md:items-center flex-col pl-48 md:pl-0 pt-0 md:pt-12">
                    <h5 class="text-lg font-semibold">Decoration</h5>
                    <span class="">77.392 items</span>
                </div>
                <a href="details.html" class="stretched-link">
                    <!-- fake children -->
                </a>
            </div>
            <div class="relative col-span-9 row-span-1 md:col-span-3 md:row-span-2 card">
                <div class="card-shadow rounded-xl">
                    <img src="frontend/images/content/image-catalog-4.png" alt=""
                        class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                </div>
                <div
                    class="overlay right-0 left-0 top-0 bottom-0 md:bottom-auto flex justify-center md:items-center flex-col pl-48 md:pl-0 pt-0 md:pt-12">
                    <h5 class="text-lg font-semibold">Living Room</h5>
                    <span class="">22.094 items</span>
                </div>
                <a href="details.html" class="stretched-link">
                    <!-- fake children -->
                </a>
            </div>
            <div class="relative col-span-9 row-span-1 md:col-span-4 card">
                <div class="card-shadow rounded-xl">
                    <img src="frontend/images/content/image-catalog-2.png" alt=""
                        class="w-full h-full object-cover object-center overlay overflow-hidden rounded-xl" />
                </div>
                <div class="overlay left-0 top-0 bottom-0 flex justify-center flex-col pl-48 md:pl-72">
                    <h5 class="text-lg font-semibold">Children Room</h5>
                    <span class="">837 items</span>
                </div>
                <a href="details.html" class="stretched-link">
                    <!-- fake children -->
                </a>
            </div>
        </div>
    </div>
</section>
<!-- END: BROWSE THE ROOM -->

<!-- START: JUST ARRIVED -->
<section class="flex flex-col py-16">
    <div class="container mx-auto mb-4">
        <div class="flex justify-center text-center mb-4">
            <h3 class="text-2xl capitalize font-semibold">
                Just Arrived <br class="" />this summer for you
            </h3>
        </div>
    </div>
    <div class="overflow-x-hidden px-4" id="carousel">
        <div class="container mx-auto"></div>
        <!-- <div class="overflow-hidden z-10"> -->
        <div class="flex -mx-4 flex-row relative">
            <!-- START: JUST ARRIVED ROW 1 -->
            @foreach ($products as $product)
            <div class="px-4 relative card group">
                <div class="rounded-xl overflow-hidden card-shadow relative" style="width: 287px; height: 386px">
                    <div
                        class="absolute opacity-0 group-hover:opacity-100 transition duration-200 flex items-center justify-center w-full h-full bg-black bg-opacity-35">
                        <div class="bg-white text-black rounded-full w-16 h-16 flex items-center justify-center">
                            <svg class="fill-current" width="43" height="24" viewBox="0 0 43 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M41.6557 10.0065C39.2794 6.95958 36.2012 4.43931 32.7542 2.71834C29.2355 0.961548 25.4501 0.0500333 21.4985 0.00223289C21.3896 -0.000744296 20.9526 -0.000744296 20.8438 0.00223289C16.8923 0.050116 13.1068 0.961548 9.58807 2.71834C6.14106 4.43931 3.06307 6.9595 0.686613 10.0065C-0.228871 11.1802 -0.228871 12.8198 0.686613 13.9935C3.06299 17.0404 6.14106 19.5607 9.58807 21.2817C13.1068 23.0385 16.8922 23.95 20.8438 23.9978C20.9526 24.0007 21.3896 24.0007 21.4985 23.9978C25.45 23.9499 29.2355 23.0385 32.7542 21.2817C36.2012 19.5607 39.2793 17.0405 41.6557 13.9935C42.5712 12.8196 42.5712 11.1802 41.6557 10.0065ZM10.3576 19.7406C7.13892 18.1335 4.26445 15.7799 2.04487 12.9341C1.61591 12.3841 1.61591 11.6159 2.04487 11.0659C4.26436 8.22009 7.13883 5.86646 10.3576 4.25944C11.2717 3.80311 12.2053 3.40846 13.1561 3.07436C10.71 5.27317 9.16886 8.45975 9.16886 12C9.16886 15.5403 10.7101 18.7272 13.1564 20.9259C12.2056 20.5918 11.2718 20.197 10.3576 19.7406ZM21.1712 22.2798C15.5028 22.2798 10.8913 17.6683 10.8913 11.9999C10.8913 6.33148 15.5028 1.72007 21.1712 1.72007C26.8396 1.72007 31.4511 6.33156 31.4511 12C31.4511 17.6684 26.8396 22.2798 21.1712 22.2798ZM40.2976 12.9341C38.0781 15.7798 35.2036 18.1335 31.9849 19.7405C31.0718 20.1963 30.1388 20.5892 29.1892 20.923C31.6336 18.7243 33.1736 15.5387 33.1736 11.9999C33.1736 8.45918 31.6321 5.27218 29.1856 3.07336C30.1366 3.40755 31.0705 3.80269 31.9849 4.25928C35.2036 5.86629 38.0781 8.21993 40.2976 11.0657C40.7265 11.6158 40.7265 12.384 40.2976 12.9341Z" />
                                <path
                                    d="M21.1712 7.60071C18.7454 7.60071 16.772 9.57417 16.772 11.9999C16.772 14.4257 18.7454 16.3991 21.1712 16.3991C23.5969 16.3991 25.5704 14.4257 25.5704 11.9999C25.5705 9.57417 23.597 7.60071 21.1712 7.60071ZM21.1712 14.6767C19.6952 14.6767 18.4944 13.476 18.4944 11.9999C18.4944 10.5239 19.6951 9.32318 21.1712 9.32318C22.6471 9.32318 23.8479 10.5239 23.8479 11.9999C23.848 13.476 22.6471 14.6767 21.1712 14.6767Z" />
                            </svg>
                        </div>
                    </div>
                    <img src="{{ $product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=='}}"
                        alt="" class="w-full h-full object-cover object-center" />
                </div>
                <h5 class="text-lg font-semibold mt-4">{{ $product->name }}</h5>
                <span class="">IDR {{ $product->price }}</span>
                <a href="{{ route('details', $product->slug) }}" class="stretched-link">
                    <!-- fake children -->
                </a>
            </div>
            @endforeach
            <!-- END: JUST ARRIVED ROW 1 -->
        </div>
        <!-- </div> -->
    </div>
</section>
<!-- END: JUST ARRIVED -->

<!-- START: CLIENTS -->
<section class="container mx-auto">
    <div class="flex justify-center flex-wrap">
        <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4 md:my-0">
            <img src="frontend/images/content/logo-adobe.svg" alt="" class="mx-auto" />
        </div>
        <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4 md:my-0">
            <img src="frontend/images/content/logo-ikea.svg" alt="" class="mx-auto" />
        </div>
        <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4 md:my-0">
            <img src="frontend/images/content/logo-hermanmiller.svg" alt="" class="mx-auto" />
        </div>
        <div class="w-full flex-auto md:w-auto md:flex-initial px-4 md:px-6 my-4 md:my-0">
            <img src="frontend/images/content/logo-miele.svg" alt="" class="mx-auto" />
        </div>
    </div>
</section>
<!-- END: CLIENTS -->
@endsection