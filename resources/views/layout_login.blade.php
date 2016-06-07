<html>
<head>
    <meta charset="utf-8" />
    <!-- disable iPhone inital scale -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>BlueBox - @yield('title')</title>
    <META NAME="description" CONTENT="Gestor de contenidos">
    <meta name="classification" content="Gestor de contenidos" />
    <meta name="copyright" content="ICON" />
    <meta name="author" content="Ocean DevGroup"  />
    <link rel="author" content="Ocean DevGroup" title="Ocean Development Group" href="https://www.oceandg.com">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!--  MAIN CSS -->
    <link href="{!! asset('css/access.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/font-awesome.css') !!}" media="all" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="container">
    @yield('content')
</div>
</body>
</html>
