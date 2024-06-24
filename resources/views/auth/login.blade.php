<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="flex justify-center items-center min-h-screen bg-blue-950">
        <div class="grid grid-cols-1">
            <div class="flex justify-center items-center mb-10">
                <h1 class="text-yellow-400 font-serif font-bold text-4xl">Matador</h1>
            </div>
            <div
                class="flex flex-col items-center bg-white border border-gray-200 rounded-xl shadow md:flex-row md:max-w-xl dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <form action="{{ route('login-proses') }}" method="post" class="w-full max-w-md mx-auto px-12 py-4">
                    @csrf
                    <div class="flex justify-center mb-6 py-0">
                        <h1 class="text-2xl font-bold">Login</h1>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm text-gray-900 dark:text-white">
                            Email</label>
                        <input type="email" id="email" name="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 px-16 ps-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm text-gray-900 dark:text-white">
                            Password</label>
                        <input type="password" id="password" name="password"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required />
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if ($message = Session::get('failed'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Failed',
        text: '{{ $message }}',
    })
    </script>
@endif
@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ $message }}',
    })
    </script>
@endif

</html>
