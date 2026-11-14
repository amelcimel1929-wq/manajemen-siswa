<!DOCTYPE html>
<html lang="id">
{{-- bagian head --}}
@include('data diri.partials.head')

<body>
    <div class="app">
        {{-- sidebar navigation --}}
        @include('data diri.components.sidebar')

        {{-- main content dinamis --}}
        @yield('content')
    </div>
</body>
</html>
