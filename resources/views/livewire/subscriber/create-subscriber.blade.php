<x-guest-layout>
    <x-pages.standard-page>
        <div onclick="location.href='/';" class="cursor-pointer">
            <menus class="grid grid-cols-1 border-b-2 ">

                <livewire:menus.menu-top />

                <x-menus.menu-middle />

                <x-menus.menu-bottom />

            </menus>
        </div>
        <x-forms.card title="Newsletter Registration">

            <!-- component -->
            <div class="flex items-center justify-center p-6">

                <div class="mx-auto w-full max-w-[550px]">

                    <form action="/subscribers" method="post">
                        @csrf
                        <div class="mb-5">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                Full Name
                            </label>
                            <input type="text" name="name" id="name" placeholder="Full Name"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('name')
                            <div class="p-2 text-red-500 font-semibold">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                Email Address
                            </label>
                            <input type="email" name="email" id="email" placeholder="example@domain.com"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('email')
                            <div class="p-2 text-red-500 font-semibold">{{ $message }}</div>
                            @enderror
                        </div>


                        <div>
                            <button
                                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </x-forms.card>

    </x-pages.standard-page>
</x-guest-layout>