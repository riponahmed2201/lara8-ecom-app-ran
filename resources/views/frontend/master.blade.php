<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    @include('frontend.includes.stylesheet')

</head>
<body class="cnt-home">

<!-- ============================================== HEADER ============================================== -->
@include('frontend.includes.header')
<!-- ============================================== HEADER : END ============================================== -->

@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.includes.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
@include('frontend.includes.script')
</body>

</html>
