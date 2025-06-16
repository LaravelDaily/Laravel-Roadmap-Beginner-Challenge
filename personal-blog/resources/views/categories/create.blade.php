@component('layouts.main')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new Category</h2>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <x-input-text name="name" hint="type your name" value="{{ old('name') }}"/>
                </div>
                <x-primary-button class="mt-5">
                    Add Category
                </x-primary-button>
            </form>
            <div class="my-4">
                @if($errors->any())
                    {!!  implode('', $errors->all('<li class="text-md font-bold text-red-500 text-sm">:message</li>')) !!}
                @endif
            </div>
        </div>
    </section>
@endcomponent
