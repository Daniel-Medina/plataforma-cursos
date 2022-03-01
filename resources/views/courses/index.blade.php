<x-app-layout>
    <!-------Portada ----------->
    <section class="bg-cover" style="background-image: url({{asset('img/home/banner.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="bg-gray-800 bg-opacity-25 w-full nd:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">Encuentra lo que necesitas</h1>
                <p class="text-white text-lg mt-2 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Sequi cumque laudantium odio officiis facere soluta dolor animi molestiae reprehenderit fugit eos, eaque consectetur voluptate quae laboriosam. Obcaecati veniam dolorem amet.</p>

                    <!-- This is an example component -->
                    @livewire('search')
            </div>   
        </div>
    </section>

    @livewire('courses-index')
</x-app-layout>