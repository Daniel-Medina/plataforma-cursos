<x-app-layout>
    <!-------Portada ----------->
<section class="bg-cover" style="background-image: url({{asset('img/home/banner.jpg')}})">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
        <div class="bg-gray-800 bg-opacity-25 w-full nd:w-3/4 lg:w-1/2">
        <h1 class="text-white font-fold text-4xl">Encuentra lo que necesitas</h1>
        <p class="text-white text-lg mt-2 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Sequi cumque laudantium odio officiis facere soluta dolor animi molestiae reprehenderit fugit eos, eaque consectetur voluptate quae laboriosam. Obcaecati veniam dolorem amet.</p>

            <!-- Buscador -->
            @livewire('search')
            
        </div>   
    </div>
</section>

<section class="mt-24 mb-20">
    <h1 class="text-gray-600 text-center text-3xl mb-6">Contenido</h1>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        
        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/banner.jpg')}}" alt="">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-600">Prueba imagen</h1>
            </header>
            <p class="text-sm text-gray-500">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas nulla reprehenderit.
            </p>
        </article>

        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/banner.jpg')}}" alt="">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-600">Prueba imagen</h1>
            </header>
            <p class="text-sm text-gray-500">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas nulla reprehenderit.
            </p>
        </article>

        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/banner.jpg')}}" alt="">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-600">Prueba imagen</h1>
            </header>
            <p class="text-sm text-gray-500">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas nulla reprehenderit.
            </p>
        </article>

        <article>
            <figure>
                <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/banner.jpg')}}" alt="">
            </figure>

            <header class="mt-2">
                <h1 class="text-center text-xl text-gray-600">Prueba imagen</h1>
            </header>
            <p class="text-sm text-gray-500">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas nulla reprehenderit.
            </p>
        </article>

    </div>
</section>

<section class="mt-24 bg-gray-700 py-12">
    <h1 class="text-center text-white text-3xl">No sabes que hacer</h1>
    <p class="text-center text-white">Encuentra tu curso ideal de entre la variedad</p>

    <div class="flex justify-center mt-4">
        <a href="{{route('courses.index')}} "
        type="button"
        class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
      >
        Catalogo
    </a>
    </div>
</section>

<section class="my-24">
    <h1 class="text-center text-3xl text-gray-600">ULTIMOS CURSOS</h1>
    <p class="text-center text-gray-500 text-sm mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)

        <x-course-card :course="$course"/>
            
        @endforeach

    </div>
</section>



</x-app-layout>
