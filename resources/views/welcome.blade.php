<div>
    <x-app-layout>
        <x-pages.standard-page>
                <div class="max-w-7xl min-h-screen mx-auto">
                        <div class="m-4 text-5xl text-center mt-12 p-8 border-b-2 text-gray-700 font-bold">
                            {{$post->title}}
                        </div>
                        <div class=" overflow-hidden shadow-sm min-h-full rounded-lg pb-4">
                            <div class="p-4">
                                <div style="float:left;" class="mr-6">
                                    <img class="rounded-lg" src="{{$post->cover_image}}" width='400px'
                                        alt="Cover Image">
                                </div>

                                <div class="trix-content">
                                    {!!$post->body!!}
                                </div>

                            </div>
                            <div class="text-right mr-4 font-bold text-xl">
                                <a href="/home"> Please Enter <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                </div>
        </x-pages.standard-page>
    </x-app-layout>

</div>