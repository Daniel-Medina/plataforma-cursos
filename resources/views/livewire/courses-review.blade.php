<section class="mt-4">
    <h1 class="font-bold text-3xl text-gray-800 mb-2">Valoraciones</h1>


    @can('enrolled', $course)
        <article class="mb-4">
            @can('valued', $course)
                            
                <textarea rows="3" class="form-input w-full" placeholder="Ingrese una reseña del curso." wire:model="comment"></textarea>
                <div class="flex">
                    <button wire:click.prevent="store()" class="btn btn-primary mr-2">Guardar</button>

                    <ul class="flex items-center">
                        <li class="mr-1 cursor-pointer" wire:click.prevent="$set('rating', '1')"><i class="fas fa-star text-{{$rating >= 1 ? 'yellow' : 'gray'}}-300"></i></li>
                        <li class="mr-1 cursor-pointer" wire:click.prevent="$set('rating', '2')"><i class="fas fa-star text-{{$rating >= 2 ? 'yellow' : 'gray'}}-300"></i></li>
                        <li class="mr-1 cursor-pointer" wire:click.prevent="$set('rating', '3')"><i class="fas fa-star text-{{$rating >= 3 ? 'yellow' : 'gray'}}-300"></i></li>
                        <li class="mr-1 cursor-pointer" wire:click.prevent="$set('rating', '4')"><i class="fas fa-star text-{{$rating >= 4 ? 'yellow' : 'gray'}}-300"></i></li>
                        <li class="mr-1 cursor-pointer" wire:click.prevent="$set('rating', '5')"><i class="fas fa-star text-{{$rating == 5 ? 'yellow' : 'gray'}}-300"></i></li>
                    </ul>

                </div>
            @else 
                <div class="overflow-hidden leading-normal" role="alert">
                    <p class="px-4 py-3 font-bold text-purple-100 bg-blue-600">Usted ya ha valorado este curso.</p>
                    
                </div>
            @endcan
        </article>
    @endcan


    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl">{{$course->reviews->count()}} valoraciones.</p>

            @foreach ($course->reviews as $review)
                <article class="flex mb-4 text-gray-800">
                    <figure class="mr-4">
                        <img class="w-12 h-12 object-cover rounded-full shadow-lg" src="{{$review->user->profile_photo_url}}" alt="">
                    </figure>

                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{$review->user->name}}</b> <i class="fas fa-star text-yellow-300"></i>({{$review->rating}})</p>

                            {{$review->comment}}

                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
 