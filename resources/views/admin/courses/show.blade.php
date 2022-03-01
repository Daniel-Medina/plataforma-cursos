<x-app-layout>
    <section class="mt-6 bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">

            <figure>
               @if ($course->image)
                <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
               @else
                <img class="h-60 w-full object-cover" src="https://images.pexels.com/photos/5553056/pexels-photo-5553056.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt=""> 
               @endif
            </figure>
        
            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}} </h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}} </h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$course->level->name}} </p>
                <p class="mb-2"><i class="fas fa-book"></i> Categoria: {{$course->category->name}} </p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{$course->students_count}} </p>
                <p class=""><i class="fas fa-chalkboard-teacher"></i> Calificación: {{$course->rating}} </p>
            </div>
        </div>
        
    </section>

    <!-- Lo que aprenderas / Metas -->
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6" >

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{ open : true }" x-show="open">
                <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
                    <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </span>
                    <p class="ml-6"><strong>Ocurrio un error!   </strong> {{session('info')}}!</p>
                    <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                        <svg x-on:click="open = false" class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                      </span>
                  </div>
            </div>
        @endif

        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que Aprenderás</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}} </li>
                         @empty
                            <li class="text-gray-700 text-base">Este curso no tiene asignado ninguna meta. </li>
                        @endforelse
                        
                    </ul>
                </div>


            </section>

            <!-- Temario -->
            <section class="mb-12">
                <div>
                    <h1 class="font-bold text-3xl mb-2">Temario</h1>

                    @forelse ($course->sections as $section)
                       <article class="mb-4 shadow"
                       @if ($loop->first)
                        x-data="{open: true}"
                       @else
                       x-data="{open: false}"
                       @endif >
                           <header class="border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                               <h1 class="fontbold text-lg text-gray-600"><i class="fas fa-chevron-circle-down" x-show="open"></i> <i class="fas fa-chevron-circle-right" x-show="!open"></i> {{$section->name}} </h1>
                           </header>

                           <div class="bg-white px-4 py-2" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lesson as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fas fa-play-circle text-gray-600 mr-2"></i>{{$lesson->name}} </li>
                                @endforeach
                            </ul>
                           </div>

                       </article>

                    @empty 
                       <article class="card">
                           <div class="card-body">
                               Este curso no tiene ninguna sección asignada.
                           </div>
                       </article>
                    @endforelse
                </div>
            </section>

            <!-- Requisitos -->
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>

                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}} </li>
                     @empty 
                        <li class="text-gray-700 text-base">Este curso no tiene requerimientos. </li>
                    @endforelse
                </ul>
            </section>

            <!-- Descripcion -->
            <section>
                <h1 class="font-bold text-3xl">Descripción</h1>

                <div class="text-gray-700 text-base">
                    <p>{!! $course->description !!} </p>
                </div>

            </section>

        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}} " alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-500 text-lg">Prof: {{$course->teacher->name}} </h1>
                            <a href="" class="text-blue-400 text-sm text-bold">{{'@'.Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>

                    <form action="{{route('admin.courses.approved', $course)}}" class="mt-4" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-full">Aprobar Curso</button>
                    </form>

                    <a class="btn btn-danger w-full block text-center mt-4" href="{{route('admin.courses.observation', $course)}}">Observar Curso</a>

                </div>
            </section>

        </div>
    </div>
</x-app-layout>