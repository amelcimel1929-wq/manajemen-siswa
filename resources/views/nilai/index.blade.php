<!DOCTYPE html>
<html lang="id">
{{-- bagian head --}}
@include('nilai.partials.head')

<body>
    <div class="app">
        {{-- sidebar navigation guru --}}
        @include('nilai.components.sidebar')

        {{-- main content dinamis --}}
        @yield('content')
    </div>
</body>
</html>
