<x-app-layout>
    <x-slot name="navigation">
        @include('layouts.guest-navigation')
    </x-slot>

    <div class="bg-white">
        <section class="px-3 sm:px-6 lg:px-8 py-12">
            <h1 class="text-5xl roboto-regular mb-4">
                Welcome to WanderWrite
            </h1>

            <p class="md:w-[60%] leading-7">
                A space where wanderlust and storytelling come together! At WanderWrite, we’re dedicated to bringing you stories, insights, and inspirations from around the globe. Whether you’re a seasoned traveler, a dreamer, or simply someone with a love for rich narratives, WanderWrite is here to fuel your passion for both adventure and words.
            </p>
        </section>
        
        <section class="px-3 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div>
                    <h2 class="text-3xl roboto-regular mb-3">
                        Our Mission
                    </h2>
                    <p class="leading-7">
                        Our mission at WanderWrite is to bridge the worlds of travel and writing. We believe every destination has its own voice, and through our content, we aim to capture the beauty, culture, and spirit of each place. Our goal is to inspire you to explore, to dream, and to create stories of your own—whether that means stepping out into the world or into the pages of a book.
                    </p>
                </div>
                <div>
                    <h2 class="text-3xl roboto-regular mb-3">
                        Why We Started WanderWrite
                    </h2>
                    <p class="leading-7">
                        WanderWrite was born out of a love for exploration and expression. We believe travel is more than just seeing places; it’s about connecting with people, understanding diverse cultures, and discovering parts of ourselves. Our founder created WanderWrite as a way to share these experiences and foster a community where travelers and writers can find common ground.
                    </p>
                </div>
                <div>
                    <h2 class="text-3xl roboto-regular mb-3">
                        What You’ll Find Here
                    </h2>
                    <p class="leading-7">
                        On WanderWrite, you’ll find a variety of content that captures the essence of travel and storytelling:
                    </p>
                    <ul class="list-disc ml-5 leading-7">
                        <li>
                            <strong> Travel Guides & Tips: </strong> Practical advice and insights to make the most of your journeys
                        </li>
                        <li>
                            <strong> Destination Features: </strong> In-depth looks at both popular and off-the-beaten-path locations
                        </li>
                        <li>
                            <strong> Cultural Insights: </strong> Stories that delve into the unique traditions, foods, and customs of the places we explore
                        </li>
                        <li>
                            <strong> Inspiration for Writers: </strong> Tips, prompts, and encouragement for aspiring writers with a traveler's heart
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-3xl roboto-regular mb-3">
                        Join Our Journey
                    </h2>
                    <p class="leading-7">
                        Thank you for being here at WanderWrite! Whether you’re planning your next big adventure or simply seeking inspiration, we’re thrilled to share our stories with you. Join us as we wander, write, and bring the world a little closer, one story at a time. Don’t forget to subscribe to our newsletter and follow us on social media to stay connected with the WanderWrite community. Safe travels, and happy reading!
                    </p>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
