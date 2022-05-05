<x-layout>
    <main class="max-w-screen-md mx-auto">
        <x-success-message/>
        <h1 class="font-black mb-4 text-3xl">Manage</h1>

        <div class="grid grid-cols-4 gap-4">
            <x-side-nav class="col-span-1"/>

            <section {{ $attributes->merge(['class' => 'col-span-3 bg-white p-4 shadow']) }}>

                {{ $slot }}
            </section>
        </div>
    </main>
</x-layout>
