<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'HMI Cabang Ponorogo Komisariat Fitrah')</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" href="{{ asset('images/logo-fitrah.png') }}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="font-[Inter] bg-gray-50 min-h-screen">
    @include('admin.layouts.notification')
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Main -->
    <div class="lg:pl-64">
        <!-- Topbar -->
        @include('admin.layouts.header')

        <!-- Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>


</body>

</html>
