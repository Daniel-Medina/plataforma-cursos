<x-instructor-layout :course="$course">


    <div class="card-body text-gray-600">
        <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
        <hr class="mt-2 mb-6">


        {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}
            

            @include('instructor.courses.partials.form')

                <div class="flex justify-end">
                    {!! Form::submit('Actualizar curso', ['class' => 'btn btn-primary']) !!}
                </div>

        {!! Form::close() !!}

    </div>

    <x-slot name="js">
        {{-- Texto enriquecido --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}} "></script>
    </x-slot>
    
</x-instructor-layout>