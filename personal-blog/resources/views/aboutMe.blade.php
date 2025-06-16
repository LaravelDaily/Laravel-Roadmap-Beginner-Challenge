@component('layouts.main')
    <div>
        <div class="flex h-screen items-center justify-center bg-gray-900 p-5">
            <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-10 md:px-10">
                <div>
                    <h1 class="mb-2 text-3xl font-bold text-white"><span class="text-green-500">Hi,</span> I'm Back-End Developer</h1>
                    <p class="mb-6 text-white">
                        My name is Teon, and I'm 20 years old. I've been passionate about programming since I was a child. My interest in coding started early, and I've been exploring it ever since. Currently, I'm focused on learning Laravel and PHP, diving into the world of web development. My goal is to improve my skills and become a professional developer. For me, programming is not just a career but an art form, and I enjoy creating new things.
                    </p>
                </div>
                <div>
                    <div class="relative inline-block">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/img/profile.jpg') }}" alt="Profile Picture" class="w-80 h-80 rounded-full blur-sm absolute -top-3 left-0 z-0" />
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/img/profile.jpg') }}" alt="Profile Picture" class="w-72 h-72 rounded-full relative z-10" />
                    </div>

                </div>
            </div>
        </div>
    </div>
@endcomponent
