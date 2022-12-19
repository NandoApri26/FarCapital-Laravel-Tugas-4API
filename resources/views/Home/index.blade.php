@extends('templating.main')
@section('title', 'Beranda || TOKOMafia')

@section('content')

<div class="flex container flex-wrap gap-14">
    @foreach ($product as $item)
    <div class=" py-20">
        <div class="max-w-sm mt-10 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 hover:delay-150 hover:scale-110 transition-all duration-500">
            <a href="#">
                <img class="rounded-t-lg w-96 h-64 object-cover " src="{{asset('img/' . $item->product_image)}}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{(strlen($item->product_name) > 5) ? substr ($item -> product_name, 0, 35). "..." : $item -> product_name}}
                    </h5>
                </a>
                <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                    {{ $item -> product_stock }}
                </p>
                <h6 class="mb-2 font-semibold text-gray-700 dark:text-gray-400">
                    Rp. {{ $item -> product_price }}
                </h6>
                <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                    {{(strlen($item->product_description) > 100) ? substr ($item -> product_description, 0, 100). "..." : $item -> product_description}}
                </p>
                <a href="#" class="inline-flex items-center px-3 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 gap-3">
                    Tambah Keranjang <i class="fa fa-shopping-cart"></i>
                </a>

                <a href="{{ url ('/Product/' . $item->id) . '/detail'}}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Lihat Detail
                    </span>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
