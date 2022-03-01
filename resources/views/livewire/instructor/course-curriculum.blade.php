<div>

    
    <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->sections as $item)

        <article class="card mb-6" x-data="{open : true}">
            <div class="card-body bg-gray-100">

                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input type="text" wire:model="section.name" class="form-input w-full" placeholder="Ingrese el nombre de la Sección" >
                        @error('section.name')
                            <span class="text-sm text-red-500 font-bold">{{$message}}</span>
                        @enderror
                    </form>
                @else   
                    <header class="flex justify-between object-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sección: </strong> {{$item->name}}</h1>

                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item->id}})"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item->id}})"></i>
                        </div>
                    </header>

                    <div x-show="open">
                        @livewire('instructor.course-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif

            </div>
        </article>
    @endforeach

    <div x-data="{open: false}" >
        <a class="flex item-center cursor-pointer" x-on:click="open = true" x-show="!open">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva Section
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar Nueva Sección</h1>

                <div>
                    <input wire:model="name" type="text" class="form-input w-full" placeholder="Escriba el Nombre de la Sección" id="">
                    @error('name')
                        <span class="text-sm text-red-500 font-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-4">
                    <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store()">Agregar</button>
                </div>
            </div>
        </article>

    </div>

</div>
