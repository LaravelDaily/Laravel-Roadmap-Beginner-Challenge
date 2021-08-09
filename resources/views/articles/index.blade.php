<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- component -->
            <section class="container mx-auto p-6 font-mono">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-200 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Words</th>
                                <th class="px-4 py-3">Date</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @each('components.t-row',$articles,'article','components.no-data')
                            </tbody>
                        </table>
                        <div class="m-2">
                            {{$articles->links()}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
