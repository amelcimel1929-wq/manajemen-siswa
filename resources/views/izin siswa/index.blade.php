<!DOCTYPE html>
<html lang="en">
{{-- bagian head --}}
@include('izin siswa.partials.head')

<body>
    <div class="app">
        @include('izin siswa.components.sidebar')

        {{-- main content --}}
        @yield('content')
    </div>
</body>
</html>
