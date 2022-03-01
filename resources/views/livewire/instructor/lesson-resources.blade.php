<div class="card" x-data="{open : false}">
    <div class="card-body bg-gray-100">
        <header>
            <h1 x-on:click="open = !open" class="cursor-pointer">Recursos de la Lección</h1>
        </header>

        <div x-show="open">
            <hr class="my-2">
            @if($lesson->resource)
                <div class="flex justify-between items-center">
                    <p><i class="fas fa-download text-gray-500 mr-2 cursor-pointer" wire:click="download()"></i> {{$lesson->resource->url}}</p>
                    <i wire:click="destroy()" class="fas fa-trash cursor-pointer text-red-500"></i>
                </div>
            @else
                <form wire:submit.prevent="save()">
                    <div class="flex items-center">
                        <input type="file" class="form-input flex-1" wire:model="file">
                        <button type="submit" class="btn btn-primary text-sm ml-2">Guardar</button>
                    </div>

                    <div wire:loading wire:target="file" class="text-blue-500 font-bold mt-1">
                        Cargando...
                    </div>

                    @error('file')
                    <span class="text-xs text-red-500"> {{$message}}</span>
                    @enderror
                </form>
            
            @endif
        </div>
    </div>
</div>
