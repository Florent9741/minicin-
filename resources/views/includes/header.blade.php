<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <!-- component -->
<div class="py-16 bg-gradient-to-br from-green-50 to-cyan-100">  
    <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
        <div class="mb-12 space-y-2 text-center">
         
          <h2 class="text-2xl text-cyan-900 font-bold md:text-4xl">Films à l'affiche</h2>
         
        </div>
  
        <div class="grid gap-12 lg:grid-cols-2">
          
         @foreach($films as $film)

          <div class="p-1 rounded-xl group sm:flex space-x-6 bg-white bg-opacity-50 shadow-xl hover:rounded-2xl">
            <img src="./images/d2.jpg" alt="art cover" loading="lazy" width="1000" height="667" class="h-56 sm:h-full w-full sm:w-5/12 object-cover object-top rounded-lg transition duration-500 group-hover:rounded-xl">
            <div class="sm:w-7/12 pl-0 p-5">
              <div class="space-y-2">
                <div class="space-y-4">
                  <h4 class="text-2xl font-semibold text-cyan-900">{{$film->titre}}</h4>
                  <p class="text-gray-600">{{$film->extrait}}</p>
                </div>
                <a href="www.tailus.io" class="block w-max text-cyan-600">Réservé</a>
              </div>
            </div>
          </div>

          @endforeach
  
        </div>
    </div>
  </div>
</body>
</html>