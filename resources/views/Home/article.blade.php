@extends('templating.main')
@section('title', 'Article || TOKOMafia')

@section('content')

<div class="flex container flex-wrap gap-14">
    @foreach ($article as $item)
    <div class=" pt-4">
        <div class="max-w-sm mt-8 h- bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 ">
            <a href="#">
                <img class="rounded-t-lg w-96 h-56 object-cover" src="{{asset('img-article/' . $item->image_article)}}" alt="" />
            </a>
            <div class="p-5">
                <p class="flex gap-2 items-center mb-2 font-normal text-[12px] text-gray-700 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                    {{ $item -> tanggal }}
                </p>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{(strlen($item->judul_article) > 5) ? substr ($item -> judul_article, 0, 20). "..." : $item -> judul_article}}
                    </h5>
                </a>
                <a href="#">
                    <h6 class="mb-2 text-base font-reguler tracking-tight text-gray-900 dark:text-white">
                        {{(strlen($item->sub_description) > 5) ? substr ($item -> sub_description, 0, 35). "..." : $item -> sub_description}}
                    </h6>
                </a>
                <a href="{{ url ('/Article/' . $item->id) . '/detail'}}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Read Mode
                    </span>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
