@extends('layouts.frontend')

@section('content')
<!-- START: BREADCRUMB -->
<section class="bg-gray-100 py-8 px-4">
    <div class="container mx-auto">
        <ul class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="#" aria-label="current-page">Shopping Cart</a>
            </li>
        </ul>
    </div>
</section>
<!-- END: BREADCRUMB -->

<!-- START: COMPLETE YOUR ROOM -->
<section class="md:py-16">
    <div class="container mx-auto px-4">
        <div class="flex -mx-4 flex-wrap">
            <div class="w-full px-4 mb-4 md:w-8/12 md:mb-0" id="shopping-cart">
                <div class="flex flex-start mb-4 mt-8 pb-3 border-b border-gray-200 md:border-b-0">
                    <h3 class="text-2xl">Shopping Cart</h3>
                </div>

                <div class="border-b border-gray-200 mb-4 hidden md:block">
                    <div class="flex flex-start items-center pb-2 -mx-4">
                        <div class="px-4 flex-none">
                            <div class="" style="width: 90px">
                                <h6>Photo</h6>
                            </div>
                        </div>
                        <div class="px-4 w-5/12">
                            <div class="">
                                <h6>Product</h6>
                            </div>
                        </div>
                        <div class="px-4 w-5/12">
                            <div class="">
                                <h6>Price</h6>
                            </div>
                        </div>
                        <div class="px-4 w-2/12">
                            <div class="text-center">
                                <h6>Action</h6>
                            </div>
                        </div>
                    </div>
                </div>



                @forelse ($carts as $item)
                <!-- START: ROW 1 -->
                <div class="flex flex-start flex-wrap items-center mb-4 -mx-4" data-row="1">
                    <div class="px-4 flex-none">
                        <div class="" style="width: 90px; height: 90px">
                            <img src="{{ $item->product->galleries()->exists() ? Storage::url($item->product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                                alt="chair-1" class="object-cover rounded-xl w-full h-full" />
                        </div>
                    </div>
                    <div class="px-4 w-auto flex-1 md:w-5/12">
                        <div class="">
                            <h6 class="font-semibold text-lg md:text-xl leading-8">
                                {{ $item->product->name }}
                            </h6>
                            <span class="text-sm md:text-lg">Office Room</span>
                            <h6 class="font-semibold text-base md:text-lg block md:hidden">
                                IDR {{ number_format($item->product->price)}}
                            </h6>
                        </div>
                    </div>
                    <div class="px-4 w-auto flex-none md:flex-1 md:w-5/12 hidden md:block">
                        <div class="">
                            <h6 class="font-semibold text-lg">IDR {{ number_format($item->product->price)}}</h6>
                        </div>
                    </div>
                    <div class="px-4 w-2/12">
                        <div class="text-center">
                            <form action="{{ route('cart-delete', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 border-none focus:outline-none px-3 py-1">
                                    X
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END: ROW 1 -->
                @empty
                <p id="cart-empty" class="hidden text-center py-8">
                    Ooops... Cart is empty
                    <a href="{{ route('index') }}" class="underline">Shop Now</a>
                </p>
                @endforelse

            </div>
            <div class="w-full md:px-4 md:w-4/12" id="shipping-detail">
                <div class="bg-gray-100 px-4 py-6 md:p-8 md:rounded-3xl">
                    <form action="{{ route('checkout') }} " method="post">
                        @csrf
                        <div class="flex flex-start mb-6">
                            <h3 class="text-2xl">Shipping Details</h3>
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="complete-name" class="text-sm mb-2">Complete Name</label>
                            <input data-input type="text" name="name" id="complete-name"
                                class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                placeholder="Input your name" />
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="email" class="text-sm mb-2">Email Address</label>
                            <input data-input type="email" name="email" id="email"
                                class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                placeholder="Input your email address" />
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="address" class="text-sm mb-2">Address</label>
                            <input data-input type="text" name="address" id="address"
                                class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                placeholder="Input your address" />
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="phone-number" class="text-sm mb-2">Phone Number</label>
                            <input data-input type="tel" name="phone" id="phone-number"
                                class="border-gray-200 border rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                                placeholder="Input your phone number" />
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="complete-name" class="text-sm mb-2">Choose Courier</label>
                            <div class="flex -mx-2 flex-wrap">
                                <div class="px-2 w-6/12 h-24 mb-4">
                                    <button type="button" data-value="fedex" data-name="courier"
                                        class="border border-gray-200 focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full focus:outline-none">
                                        <img src="{{ asset('frontend/images/content/logo-fedex.svg') }}"
                                            alt="Logo Fedex" class="object-contain max-h-full" />
                                    </button>
                                </div>
                                <div class="px-2 w-6/12 h-24 mb-4">
                                    <button type="button" data-value="dhl" data-name="courier"
                                        class="border border-gray-200 focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full focus:outline-none">
                                        <img src="{{ asset('frontend/images/content/logo-dhl.svg' )}}" alt="Logo dhl"
                                            class="object-contain max-h-full" />
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="complete-name" class="text-sm mb-2">Choose Payment</label>
                            <div class="flex -mx-2 flex-wrap">
                                <div class="px-2 w-6/12 h-24 mb-4">
                                    <button type="button" data-value="midtrans" data-name="payment"
                                        class="border border-gray-200 focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full focus:outline-none">
                                        <img src="{{ asset('frontend/images/content/logo-midtrans.png') }}"
                                            alt="Logo midtrans" class="object-contain max-h-full" />
                                    </button>
                                </div>
                                <div class="px-2 w-6/12 h-24 mb-4">
                                    <button type="button" data-value="mastercard" data-name="payment"
                                        class="border border-gray-200 focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full focus:outline-none">
                                        <img src="{{ asset('frontend/images/content/logo-mastercard.svg') }}"
                                            alt="Logo mastercard" />
                                    </button>
                                </div>
                                <div class="px-2 w-6/12 h-24 mb-4">
                                    <button type="button" data-value="bitcoin" data-name="payment"
                                        class="border border-gray-200 focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full focus:outline-none">
                                        <img src="{{ asset('frontend/images/content/logo-bitcoin.svg') }}"
                                            alt="Logo bitcoin" class="object-contain max-h-full" />
                                    </button>
                                </div>
                                <div class="px-2 w-6/12 h-24 mb-4">
                                    <button type="button" data-value="american-express" data-name="payment"
                                        class="border border-gray-200 focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full focus:outline-none">
                                        <img src="{{ asset('frontend/images/content/logo-american-express.svg') }}"
                                            alt="Logo american-logo-american-express" />
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" disabled
                                class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 focus:outline-none w-full py-3 rounded-full text-lg focus:text-black transition-all duration-200 px-6">
                                Checkout Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: COMPLETE YOUR ROOM -->
@endsection