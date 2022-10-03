<x-guest-layout>
    <x-pages.standard-page>
        <div onclick="location.href='/';" class="cursor-pointer>
            <menus class=" grid grid-cols-1 border-b-2 ">

                <Livewire:menus.menu-top />

                <x-menus.menu-middle />

                <Livewire:menus.menu-bottom />
            </menus>
        </div>
        <div >
            @if($isVerified)
            <div >
                <x-forms.card title=" Thank you, your subscription has been verified.">

            <p class="text-center mt-2 text-xs">
                (Click on home to return to front Page)
            </p>
            </x-forms.card>
        </div>
        @endif
        @if(!$isVerified)
        <div :show='!isVerified'>
            <x-forms.card title="Sorry validation can not be repeated or the validation code is incorrect.">

                <p class="text-center mt-2 text-xs">
                    (Click on the banner to return to front Page)
                </p>
            </x-forms.card>
        </div>
        @endif
        </div>


    </x-pages.standard-page>
</x-guest-layout>