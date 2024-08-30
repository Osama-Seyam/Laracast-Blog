<!doctype html>

<title>My Personal Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('profile/css/fontawesome.all.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('profile/css/adminlte.css')}}">

<style>
    html{
        scroll-behavior: smooth;
    }

</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/My Blog.png" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>


                </div>
                    @auth
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="text-xs font-bold uppercase">Welcome! {{auth()->user()->name}}</button>
                            </x-slot>
                            @can('admin')
                                <x-dropdown-item href="/admin/posts">Dashboard</x-dropdown-item>
                            @endcan
                        </x-dropdown>
                    @endauth
                <div>


            <div class="mt-8 md:mt-0">
                @auth
                   <form action="/logout" method="POST">
                    @csrf
                        <button type="submit" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                            Log out
                        </button>
                    </form>
                @else
                    <a href="/login" class="text-xs font-bold uppercase">Log in</a>
                    <a href="/register" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Register
                    </a>
                @endauth



            </div>
        </nav>

        {{$slot}}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="./images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>
        </footer>
    </section>

    <x-flash />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{asset('profile/js/jquery.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('profile/js/bootstrap.bundle.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('profile/js/adminlte.js')}}"></script>

</body>
