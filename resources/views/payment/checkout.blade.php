<x-app-layout>


    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>

        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img src="{{Storage::url($course->image->url)}}" class="h-12 w-12 object-cover" alt="">
                    <h1 class="text-lg ml-2">{{$course->title}}</h1>
                    <p class="text-xl font-bold ml-auto">${{number_format($course->price->value, 2)}}</p>
                </article>

                <div class="flex justify-end mb-4">
                    <a href="{{route('payments.pay', $course)}}" class="btn btn-primary mt-2">Comprar Curso</a>
                </div>

                <hr>

                <p class="text-sm mt-4">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum sed autem maiores veniam aliquid nulla perferendis pariatur eaque eius quo! Totam quod minima architecto a repudiandae obcaecati, magni neque saepe.
                    <a href="" class="text-red-500 font-bold">Terminos y condiciones</a>
                </p>
                
            </div>
        </div>
    </div>


</x-app-layout>