<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            About Me
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 h-64">
                    <img src="{{ asset('avatar.png') }}" class="mr-7 rounded-full float-left" alt="Mr. No Namer I" title="Mr. No Namer I">
                    <p class="font-extralight text-lg text-gray-950">
                        My name is <strong>Mr. No Namer I</strong> and I am a very much acclaimed blogger.
                        <br>
                        <i>Everyone</i> knows that!
                        <br>
                        I assure you!
                        <br>
                        I write a lot about a little!
                        <br>
                        I hope you like my blog!
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>