@extends('templating.main')
@section('title', 'Article || TOKOMafia')

@section('content')
<div class="container py-20 ">
        <h2 class="text-center text-[45px] text-gray-600">Article</h2>
        <div class="my-10 font-neuton font-semibold text-white text-2xl">
            <a href="{{ url('/Article/create')}}" class=" p-2 rounded-lg bg-blue-600" role="button">Create Article</a>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Judul Article
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Sub Description
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Description
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            Tanggal
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            Image Article
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Article Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article as $item)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{$loop->iteration}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{(strlen($item->judul_article) > 5) ? substr ($item ->judul_article, 0, 15). "..." : $item ->sub_description}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{(strlen($item->sub_description) > 5) ? substr ($item ->sub_description, 0, 15). "..." : $item ->sub_description}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{(strlen($item->description) > 5) ? substr ($item ->description, 0, 15). "..." : $item ->description}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->tanggal}}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white rounded-3xl text-center">
                            <img src="{{asset('img-article/'.$item->image_article)}}" alt="" width="250">
                        </th>
                        <th scope="row" class="flex gap-2 py-4 px-6 mt-16 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center text-2xl">
                            <a href="{{ url('/Article/' . $item->id . '/detail') }}"
                                ><span class="fa-fw select-all fas text-blue-600"></span>
                            </a>
                            <a href="{{ url('/Article/' . $item->id . '/edit')}}"><span
                                    class="fa-fw select-all fas text-orange-500"></span>
                            </a>
                            <form method="POST"
                                action="{{ url('/Article/' . $item->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit"><span
                                        class="fa-fw select-all fas text-red-600"></span></button>
                            </form>
                            
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection