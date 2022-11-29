<x-app-layout>
    <section class="container mx-auto py-2">
        <h1 class="text-4xl text-gray-300 border-b">Update Category</h1>

        <section class="mt-10 overflow-x-scroll">
            <form method="post" action="{{ route('dashboard.categories.update', $category->id) }}">
                @csrf @method('put')

                <section>
                    <x-input-label for="name" class="text-lg" value="name" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autofocus :value="old('name', $category->name)" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </section>

                <x-primary-button class="mt-10 !bg-green-300">Update</x-primary-button>
            </form>
        </section>
    </section>
</x-app-layout>
