<x-app-layout>
    <x-slot name="title">
        Create a New Article
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a New Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">
                    <form method="post" action="{{ route('admin.article.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="category" value="Category" />
                            <select name="categoryId" id="category" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300">
                                @forelse($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @empty
                                    <option value="No categories added">No categories added</option>
                                @endforelse
                            </select>
                        </div>

                        <div>
                            <x-input-label for="text" value="Text" />
                            <textarea
                                id="textEditor"
                                name="text"
                                placeholder="Write a product's detail"
                                class="block w-full"
                            ></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('text')" />
                        </div>

                        <div>
                            <x-input-label for="tags" value="Tags" />                   
                            <select class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" name="tags[]" multiple>
                                @forelse($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @empty
                                    <option value="No categories added">No tags added</option>
                                @endforelse
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->first('tags')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="/ckeditor5-38.1.0.js"></script>
<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#textEditor' ), {
            ckfinder : {
                uploadUrl : "{{route('admin.image.store').'?_token='.csrf_token()}}"
            }
        } )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>