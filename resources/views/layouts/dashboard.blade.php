<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>@yield('title')</title>
</head>
<body dir="rtl" class="bg-gray-100 overflow-x-hidden">
    <div class="w-full bg-white  h-20 shadow-md px-4 md:px-12 lg:px-20 xl:px-52 flex justify-between">
        <div class="flex items-center h-full">
            <div class="cursor-pointer h-8 w-8 text-curious-blue text-3xl lg:text-4xl flex justify-start items-center">
                <i class="las la-bars"></i>
            </div>
            <div class="w-12 h-12 md:h-18 md:w-18 xl:w-64">
                <img class="w-full h-full object-contain object-center" src="{{ asset('image/UNESCO_logo_white.png') }}" alt="">
            </div>
            <div class="lg:mr-2 text-curious-blue text-base">
                <div class="flex items-center">
                    <div class="hidden lg:block md:mr-5 lg:mr-9">
                        <i class="fas fa-folder-open text-xl ml-2"></i>
                        أعلاناتي
                    </div>
                    <div class="hidden md:block md:mr-5 lg:mr-9">
                        <i class="fas fa-cubes text-xl ml-2"></i>
                        التصنيفات
                    </div>
                    <div class="hidden lg:block md:mr-5 lg:mr-9">
                        <i class="fas fa-user text-xl ml-2"></i>
                        أبحث عن خدمة
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center h-full text-curious-blue flex-row-reverse text-lg lg:text-xl">
            <div class="w-14 h-14  rounded-full mr-8 overflow-hidden">
                <img src="{{ asset('image/placeholders/face-2.jpg') }}" class="w-full h-full object-cover object-center" alt="">
            </div>
            <div class="mr-6 lg:mr-8">
                <i class="fas fa-bell"></i>
            </div>
            <div class="mr-6 lg:mr-8">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="mr-6 lg:mr-8 sm:block hidden">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="mr-6 lg:mr-8 sm:block hidden">
                <i class="fas fa-globe"></i>
            </div>
        </div>
    </div>
    <div class="w-full relative min-h-screen flex">
        <div id="dashboard-side" class=" sticky shadow-xl top-0 right-0 bg-white h-screen">
            <div class="w-full h-full px-4">
                <div class="w-32 h-28 text-center shadow-md rounded flex justify-center items-center flex-col">
                    <div class="w-full h-16 flex justify-center items-center text-curious-blue">
                        <i class="las la-tachometer-alt text-4xl"></i>
                    </div>
                    الرئيسية
                </div>
                <div class="w-32 h-28 text-center rounded text-gray-400 flex justify-center items-center flex-col">
                    <div class="w-full h-16 flex justify-center items-center ">
                        <i class="las la-shopping-cart text-4xl"></i>
                    </div>
                    الطلبات
                </div>
                <div class="w-32 h-28 text-center rounded text-gray-400 flex justify-center items-center flex-col">
                    <div class="w-full h-16 flex justify-center items-center ">
                        <i class="las la-dollar-sign text-4xl"></i>
                    </div>
                    الرصيد
                </div>
                <div class="w-32 h-28 text-center rounded text-gray-400 flex justify-center items-center flex-col">
                    <div class="w-full h-16 flex justify-center items-center ">
                        <i class="las la-calendar text-4xl"></i>
                    </div>
                    التقويم
                </div>
                <div class="w-32 h-28 text-center rounded text-gray-400 flex justify-center items-center flex-col">
                    <div class="w-full h-16 flex justify-center items-center ">
                        <i class="las la-bell text-4xl"></i>
                    </div>
                    الاشعارات الهامة
                </div>
                <div class="absolute bottom-4 w-32 h-28 text-center rounded text-gray-400 flex justify-center items-center flex-col">
                    <div class="w-full h-16 flex justify-center items-center ">
                        <i class="las la-sign-out-alt text-4xl"></i>
                    </div>
                    تسجيل الخروج
                </div>
            </div>
        </div>

        @yield('content')
</div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>