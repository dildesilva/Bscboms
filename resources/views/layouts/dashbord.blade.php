<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @livewireStyles
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Custom scrollbar for vertical scrolling */
.scrollbar-custom::-webkit-scrollbar {
  width: 8px; /* Scrollbar width */
}

.scrollbar-custom::-webkit-scrollbar-track {
  background: #040076; /* Track color */
}

.scrollbar-custom::-webkit-scrollbar-thumb {
  background: #001F3F; /* Navy blue scrollbar */
  /* border-radius: 4px; */
}

.scrollbar-custom::-webkit-scrollbar-thumb:hover {
  background: #004080; /* Darker navy blue on hover */
}
/* Mobile responsiveness styles */
@media (max-width: 768px) {
    .flex-col.md\:flex-row {
        flex-direction: column;
    }

    .md\:w-\[15\%\] {
        width: 100%;
        height: auto;
        max-height: 60px;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .md\:w-\[15\%\].sidebar-expanded {
        max-height: 1000px;
    }

    .md\:w-\[85\%\] {
        width: 100%;
        height: calc(100vh - 100px);
    }

    /* Navbar adjustments */
    .flex.w-\[95\%\] {
        flex-direction: column;
        width: 100%;
        padding: 5px;
    }

    .flex.w-\[95\%\] > div {
        width: 100%;
        margin: 5px 0;
    }

    /* Sidebar menu items */
    .w-full li {
        display: inline-block;
        width: 48%;
        margin: 1%;
    }

    /* Underwater cursor - smaller on mobile */
    #underwater-cursor {
        width: 40px;
        height: 40px;
    }

    /* Mobile menu toggle button */
    .mobile-menu-toggle {
        display: block;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        width: 50px;
        height: 50px;
        background-color: #040076;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        cursor: pointer;
    }
}

/* Hide mobile toggle on desktop */
@media (min-width: 769px) {
    .mobile-menu-toggle {
        display: none !important;
    }
}
        </style>


    </head>
    <body class="font-sans antialiased">

        <div class="h-[100vh] w-[100%]">
    <div id="underwater-cursor" class="absolute pointer-events-none w-16 h-16 bg-[#2525ff] opacity-70 rounded-full blur-3xl z-50"></div>

            <div class="t-[0] w-[100%] bg-[#1f2937]  h-[40px]">@livewire('navbarlive')</div>
            <div class="flex w-[100%] h-[calc(100vh-40px)] flex-col md:flex-row">
                <div class="w-[100%] md:w-[15%] h-[100%] bg-black/15 p-0 shadow-[1px_1px_5px_black] scrollbar-custom">
                    @livewire('sidebar')
                </div>
                <div class="w-[100%] md:w-[85%] h-[100%] bg-[#ffffff] overflow-y-scroll scrollbar-custom">
                    @yield('content')
                </div>
            </div>
        </div>



        @livewireScripts
        <script>
            const glow = document.getElementById('underwater-cursor');

            document.addEventListener('mousemove', (e) => {
                // Ensure the cursor stays within the bounds of the viewport
                const cursorSize = glow.offsetWidth;
                const maxX = window.innerWidth - cursorSize;
                const maxY = window.innerHeight - cursorSize;

                let xPos = e.clientX - (cursorSize / 2);
                let yPos = e.clientY - (cursorSize / 2);

                // Keep the cursor within the bounds
                if (xPos < 0) xPos = 0;
                if (yPos < 0) yPos = 0;
                if (xPos > maxX) xPos = maxX;
                if (yPos > maxY) yPos = maxY;

                glow.style.left = `${xPos}px`;
                glow.style.top = `${yPos}px`;
            });
        </script>
        <script>
    // Mobile sidebar toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.md\\:w-\\[15\\%\\]');
        const mobileToggle = document.createElement('div');
        mobileToggle.className = 'mobile-menu-toggle';
        mobileToggle.innerHTML = '<i class="bi bi-list" style="font-size: 1.5rem;"></i>';
        document.body.appendChild(mobileToggle);

        mobileToggle.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-expanded');
            const icon = this.querySelector('i');
            if (sidebar.classList.contains('sidebar-expanded')) {
                icon.classList.remove('bi-list');
                icon.classList.add('bi-x');
            } else {
                icon.classList.remove('bi-x');
                icon.classList.add('bi-list');
            }
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768 &&
                !sidebar.contains(e.target) &&
                e.target !== mobileToggle &&
                !mobileToggle.contains(e.target)) {
                sidebar.classList.remove('sidebar-expanded');
                const icon = mobileToggle.querySelector('i');
                icon.classList.remove('bi-x');
                icon.classList.add('bi-list');
            }
        });

        // Update active menu item highlight
        function setActiveMenuItem() {
            const path = window.location.pathname;
            const menuItems = document.querySelectorAll('.w-full li a');

            menuItems.forEach(item => {
                item.parentElement.classList.remove('bg-gray-200');
                if (item.getAttribute('href') === path) {
                    item.parentElement.classList.add('bg-gray-200');
                }
            });
        }

        setActiveMenuItem();

        // Adjust underwater cursor for mobile
        const glow = document.getElementById('underwater-cursor');
        function updateCursorSize() {
            if (window.innerWidth <= 768) {
                glow.style.width = '40px';
                glow.style.height = '40px';
            } else {
                glow.style.width = '64px';
                glow.style.height = '64px';
            }
        }

        window.addEventListener('resize', updateCursorSize);
        updateCursorSize();
    });
</script>
    </body>
</html>
