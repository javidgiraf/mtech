<!DOCTYPE html>
<html lang="en">

@include('layouts.masters.styles')

<body>

    <!-- ======= Header ======= -->
    @include('layouts.partials.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('layouts.partials.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.partials.footer')
    <!-- End Footer -->

    @include('layouts.masters.scripts')

</body>

</html>