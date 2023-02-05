<!DOCTYPE html>
<html lang="en">
    <script type="text/javascript" src="chrome-extension://ebmlchinmcaaflooobgobghnbedomhdp/webpack_common.js"></script><script type="text/javascript" src="chrome-extension://ebmlchinmcaaflooobgobghnbedomhdp/webpack_content.js"></script>
    @include('head')
<body style="">
    @include('header')
    @yield('content')
    @include('footer')
</body>
    @include('script')
</html>