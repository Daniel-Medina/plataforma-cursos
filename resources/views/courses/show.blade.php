<x-app-layout>
    <section class="mt-6 bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">

            <figure>
                <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
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

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6" >

        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que Aprenderás</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                        <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}} </li>
                            
                        @endforeach
                    </ul>
                </div>


            </section>

            <section class="mb-12">
                <div>
                    <h1 class="font-bold text-3xl mb-2 text-gray-800">Temario</h1>

                    @foreach ($course->sections as $section)
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
                    @endforeach
                </div>
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl text-gray-800">Requisitos</h1>

                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                    <li class="text-gray-700 text-base">{{$requirement->name}} </li>
                        
                    @endforeach
                </ul>
            </section>

            <section>
                <h1 class="font-bold text-3xl text-gray-800">Descripción</h1>

                <div class="text-gray-700 text-base">
                    <p>{!!$course->description!!} </p>
                </div>

            </section>

            @livewire('courses-review', ['course' => $course])

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

                    @can('enrolled', $course)

                    <a href="{{route('courses.status', $course)}} " class="btn btn-danger btn-block mt-4">Continuar el curso</a>

                    @else
                        @if ($course->price->value == 0)
                        <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">Gratis</p>

                            <form action="{{route('courses.enrolled', $course)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-block" type="submit">Llevar el curso</button>
                            </form>
                        @else
                            <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">${{number_format($course->price->value, 2)}} MX</p>

                            <a href="{{route('payments.checkout', $course)}}" class="btn btn-danger btn-block">Comprar Curso</a>
                        @endif
                    @endcan
                        

                </div>
            </section>

            <aside class="hidden lg:block card rounded-lg pt-4 pl-2">
                @foreach ($similares as $similar)
                    <article class="flex items-center mb-6">
                        <img class="h-32 w-40 object-cover rounded-lg" src="{{Storage::url($similar->image->url)}} " alt="{{$course->teacher->name}}">
                        <div class="ml-3">
                            <h1><a class="font-bold text-gray-500 mb-3" href="{{route('courses.show', $similar)}} ">{{Str::limit($similar->title, 40)}} </a></h1>

                            <div class="flex mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="">
                                <p class="text-gray-500 text-sm ml-2">{{$similar->teacher->name}} </p>
                            </div>

                            <p class="text-sm"><i class="fas fa-star text-yellow-400 mr-2"></i>{{$similar->rating}} </p>

                        </div>
                    </article>                    
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>