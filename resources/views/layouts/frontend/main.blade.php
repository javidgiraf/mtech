<!DOCTYPE html>
<html lang="en">

@include('layouts.frontend.masters.head')

<body style="height: 100vh;">
    <!-- ======================
             HEADER START   
         ====================== -->

    @include('layouts.frontend.partials.header')

    <!-- ======================
               HEADER END   
         ====================== -->

         @yield('content')


    @include('layouts.frontend.partials.footer')

    @include('layouts.frontend.masters.scripts')

</body>

</html>