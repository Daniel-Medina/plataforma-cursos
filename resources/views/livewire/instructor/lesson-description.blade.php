<div>
    <article class="card" x-data=" { open : false }">
        <div class="card-body bg-gray-100">
            <header>
                <h1 class="cursor-pointer" x-on:click="open = !open">Descripción de la Lección</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:sumit.prevent="update()">
                        <textarea class="form-input w-full" wire:model="description.name"></textarea>

                        @error('description.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button type="button" class="btn btn-danger text-sm" wire:click="destroy()">Eliminar</button>
                            <button type="submit" class="btn btn-primary text-sm ml-2">Actualizar</button>
                        </div>
                    </form>
                @else 
                    <div>
                        <textarea class="form-input w-full" wire:model="name" placeholder="Agregar Descripción"></textarea>

                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end">
                            <button class="btn btn-primary text-sm ml-2" wire:click="store()">Crear</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
