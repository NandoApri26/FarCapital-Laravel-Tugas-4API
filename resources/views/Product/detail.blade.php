@extends('templating.main')
@section('title', 'Product')

@section('content')

<div class="container py-20">
    <h2 class="text-center text-[45px] text-gray-600">Detail Product</h2>
    <div class="max-w-sm mx-auto mt-10 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{asset('img/' . $product->product_image)}}" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{(strlen($product->product_name) > 5) ? substr ($product -> product_name, 0, 35). "..." : $product -> product_name}}
                </h5>
            </a>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                {{ $product -> product_stock }}
            </p>
            <h6 class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                Rp. {{ $product -> product_price }}
            </h6>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                {{(strlen($product->product_description) > 100) ? substr ($product -> product_description, 0, 100). "..." : $product -> product_description}}
            </p>
            <a href="#" class="inline-flex items-center px-3 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 gap-3">
                Tambah Keranjang <i class="fa fa-shopping-cart"></i>
            </a>

            <a href="{{ url ('/Home') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Back
                </span>
            </a>
        </div>
    </div>

</div>

@endsection
