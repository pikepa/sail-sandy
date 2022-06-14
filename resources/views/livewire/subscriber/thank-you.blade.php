<div>
    {{-- The best athlete wants his opponent at his best. --}}
</div>
<x-guest-layout>
    <x-pages.standard-page>
            <div onclick="location.href='/';" class="cursor-pointer">
                <menus class="grid grid-cols-1 border-b-2 ">

                    <livewire:menus.menu-top />
    
                    <x-menus.menu-middle />
    
                    <x-menus.menu-bottom />
                </menus>
            </div>
         <div >
            <div >
                <x-forms.card title="Thank you for your subscription. An Email has been sent to that address for verification.">

                    <p class="text-center mt-2 text-xs">
                        (Click on banner to return to front Page)
                    </p>
                </x-forms.card>
            </div>

        </div>


    </x-pages.standard-page>
</x-guest-layout>