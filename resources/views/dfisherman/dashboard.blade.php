<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FisherPro Dashboard</title>
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="{{ mix('js/app.js') }}"></script> --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ocean: {
                            100: '#d4f1f9'
                            , 200: '#a8e3f3'
                            , 300: '#7dd5ed'
                            , 400: '#51c7e7'
                            , 500: '#2E86AB'
                            , 600: '#256b89'
                            , 700: '#1c5067'
                            , 800: '#123644'
                            , 900: '#091b22'
                        , }
                        , coral: '#F18F01'
                        , seafoam: '#A1D6E2'
                    , }
                    , fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    , }
                , }
            }
        }

    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 20px -4px rgba(0, 0, 0, 0.1);
        }

        .wave-bg {
            background: linear-gradient(135deg, #9fffd1 0%, #dcddff 50%, #ffc1c1 100%);
            min-height: 100vh;
        }

    </style>
</head>
<body class="wave-bg font-sans text-[#000000]  ">
    <div class="w-[100%] h-[100vh] overflow-y-scroll m-auto">
        <livewire:fisherman />
    </div>
    @livewireScripts
</body>
</html>
