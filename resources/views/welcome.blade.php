<div>
    <x-app-layout>
        <x-pages.standard-page>
                <div class="max-w-7xl min-h-screen mx-auto">
                        <div class="m-4 text-5xl text-center mt-12 p-8 border-b-2 text-gray-700 font-bold">
                            {{$post->title}}
                        </div>
                        <div class=" overflow-hidden  min-h-full rounded-lg pb-4">
                            <div class="p-4">
                                <div style="float:left;" class="mr-6">
                                    <img class="rounded-lg" src="{{$post->cover_image}}" width='400px'
                                        alt="Cover Image">
                                </div>

                                <div class="trix-content">
                                    {!!$post->body!!}
                                </div>

                            </div>
                        </div>
 
                        <div class="px-8 flex flex-row justify-between items-center">
                            <div class=" ">
                                <a href="/subscribers/create">
                                    <div
                                        class="rounded-lg text-center text-xl font-bold text-teal-900  py-2 px-4">
                                        Subscribe to our Newsletter
                                    </div>
                                </a>
                            </div>
                            <div class="text-right font-bold text-xl">
                                <a href="/home"> Please Enter <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                                               <!-- design details -->
                                               <div class="grid grid-cols-4 border rounded-lg bg-slate-50 gap-4 mx-4 p-4 mt-8 text-sm mb-8">
                                                <div>
                                                    <div>Publisher: {{config('constants.publisher')}}</div>
                                                    <div>Contact: {{config('constants.publisher_contact')}}</div>
                                                </div>
                                                <div>
                                                    <div>Publisher: {{config('constants.artworks')}}</div>
                                                    <div>Contact: {{config('constants.artworks_contact')}}</div>
                                                </div>
                                                <div>
                                                    <div>{{config('constants.design')}}</div>
                                                    <div>Contact: {{config('constants.design_by')}}</div>
                                                </div>
                                                <div>
                                                    <div>Website by: {{config('constants.website')}}</div>
                                                    <div>Contact: {{config('constants.website_contact')}}</div>
                                                </div>
                                            </div>
                </div>
        </x-pages.standard-page>
    </x-app-layout>

</div>