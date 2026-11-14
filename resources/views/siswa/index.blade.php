<!DOCTYPE html>
<html lang="id">
{{-- bagian head --}}
@include('siswa.partials.head')

<body>
    <div class="app">
        {{-- sidebar navigation guru --}}
        @include('siswa.components.sidebar')

        {{-- main content dinamis --}}
        @yield('content')
    </div>
</body>
</html>
