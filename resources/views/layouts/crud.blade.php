<!doctype html>
<html class="scroll-smooth">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <!-- drop Down -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</head>

<body>
    <div class="m-10 grid">
        <a href="{{ URL::previous() }}" class="w-full md:w-7/12 md:mx-auto font-bold flex gap-2 leading-10 w-fit"><img
                src="/img/icon/ic_back.svg" alt="" />
            <h1>Kembali</h1>
        </a>
        <div class="border border-gray-500 rounded-lg w-full md:w-7/12 m-auto mt-5 p-5">
            @yield('container')
        </div>
    </div>
    <script src="/js/flowbite.js"></script>
</body>

</html>
