@props(['image' => 'default.jpg'])

<div class="flex items-center" x-data="imagePreview()">
    <div class="rounded-md bg-gray-200" >
        <img id="preview" src="{{asset('images/'.$image)}}" alt="" class="w-20 h-20 rounded-md object-cover">
    </div>
    <div>
        <x-secondary-button class="relative">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                  </svg>
                  Upload image
            </div>
            <input @change="showPreview(event)" type="file" name="image" id="image" class="absolute inset-0 -z-10 opacity-0">
        </x-secondary-button>
    </div>
    <script>
        function imagePreview() {
            return {
                showPreview: (event) => {
                    if(event.target.files.length > 0) {
                        var src = URL.createObjectURL(event.target.files[0]);
                        document.getElementById('preview').src = src;
                    }
                }
            }
        }
    </script>
</div>