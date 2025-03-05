<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
     .btn{
      @apply rounded-md px-2 py-1 text-center text-slate-500 font-medium ring-1 ring-slate-700/20 hover:bg-slate-50;
     }
     .link {
      @apply font-medium text-gray-700 underline decoration-pink-500;
      }
      label {
        @apply block uppercase mb-2 text-slate-700;
      }
      input, textarea {
       @apply appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none;
       }
       .error-message {
        @apply text-red-500 text-sm;
       }
    </style>
    {{-- blade-formatter-enable --}}
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
   <h1 class="text-2xl mb-4">@yield('title')</h1>
   @if(session()->has('success'))
        <div x-data="{flash:true}">
                <div x-show="flash" class="relative mb-10 py-3 px-4 bg-green-100 text-green-700 border border-green-500/10 rounded-md shadow-lg shadow-green-200">
                <strong class="font-bold">Success!</strong>
                <div class="font-medium">{{session('success')}}</div>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" @click="flash = false"
                            stroke="currentColor" class="h-6 w-6 cursor-pointer" @click="flash=false">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                </span>
                </div>
        </div>
   @endif
   @yield('content')
</body>
</html>
