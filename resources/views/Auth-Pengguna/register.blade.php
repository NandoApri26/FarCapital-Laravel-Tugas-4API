@extends('templating.login')
@section('title', 'Register')
    @section('content')
        <body class="bg-[#EEE6C3]">
    <!-- ===== Start Register ===== -->
    <section id="Register">
        <div class="container py-8 md:py-10">
            <div class="bg-[#FCAAAA] mx-auto rounded-[38px] w-[335px] md:w-[470px] md:pb-12">
                <div class="font-poopins font-bold text-white text-center pt-10 pb-10 text-[24px] md:pt-24 md:pb-10 md:text-[50px]">
                    REGISTER
                </div>

                <form action="{{ url ('/register_pengguna')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 ml-5 md:ml-10 text-sm font-medium text-white">Nama</label>
                        <input type="text" id="name" name="name"
                            class="border border-[#EEE6C3] w-[295px] text-[12px] rounded-lg shadow-inner ml-5 md:ml-10  md:w-[392px]"
                            placeholder="Please insert your name" required />
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 ml-5 md:ml-10 text-sm font-medium text-white">Email</label>
                        <input type="email" id="email" name="email"
                            class="border border-[#EEE6C3] w-[295px] text-[12px] rounded-lg shadow-inner ml-5 md:ml-10  md:w-[392px]"
                            placeholder="Please insert your Email" required />
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 ml-5 md:ml-10 text-sm font-medium text-white">Password</label>
                        <input type="password" id="password" name="password"
                            class="border border-[#EEE6C3] w-[295px] text-[12px] rounded-lg shadow-inner ml-5 md:ml-10  md:w-[392px]"
                            placeholder="Please insert your password" required />
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="text-gray-500 bg-[#EEE6C3] hover:bg-[#FFE15D] px-8 py-2 font-poopins font-bold rounded-lg">
                            Register
                        </button>
                    </div>
                    <div class="mt-8 pb-16 px-10 text-sm font-medium  text-center text-blue-600 hover:text-blue-800">
                        <a href="{{ url ('/login_pengguna')}}">
                            <p>Sudah punya akun? Masuk</p>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ===== End Register ===== -->
</body>
@endsection