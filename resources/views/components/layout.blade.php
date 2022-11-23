<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/favicon.ico"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Land admin</title>
</head>
<body class="mb-48">
<nav class="flex justify-between items-center mb-4 bg-black">
    <ul class="flex space-x-6 mr-6 text-lg px-8">
        <li>
            <a href="/" class="hover:text-indigo-300 text-white">
                Users
            </a>
        </li>
        <li>
            <a href="/properties" class="hover:text-indigo-300 text-white">
                Land Properties
            </a>
        </li>
        <li>
            <a href="/units" class="hover:text-indigo-300 text-white">
                Land Units
            </a>
        </li>
    </ul>
</nav>
<main>
    {{$slot}}
</main>
<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-black text-white h-16 mt-24 opacity-90 md:justify-center"
>

</footer>
<x-flash-message/>
</body>
</html>
