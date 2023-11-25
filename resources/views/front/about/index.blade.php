@extends('front.layouts.app')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-xl text-center mt-44 lg:mb-16 mb-8">
                    <div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-6">
                        <div class="flex flex-wrap items-center ">
                            <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0">
                                <div class="lg:max-w-md">
                        <span class="text-xl font-semibold text-indigo-600 uppercase dark:text-indigo-500">
                            About Us</span>
                                    <h2 class="mt-4 mb-6 text-2xl font-bold dark:text-gray-300">
                                        We are the large business expert in Europe and Asia</h2>
                                    <p class="mb-10 text-gray-600 dark:text-gray-400 ">
                                        Lorem ipsum dor amet Lorem ipsum dor amet is a dummy text .Lorem ipsum dor amet isopinus
                                        ipaino amet Lorem ipsum dor amet is a dummy text</p>
                                </div>
                            </div>
                            <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0">
                                <div class="flex mb-4">
                        <span
                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-6 bg-indigo-500 rounded dark:bg-indigo-500 dark:text-gray-100 text-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="w-5 h-5 bi bi-file-earmark-code" viewBox="0 0 16 16">
                                <path
                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                                <path
                                    d="M8.646 6.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 9 8.646 7.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 9l1.647-1.646a.5.5 0 0 0 0-.708z" />
                            </svg>
                        </span>
                                    <div>
                                        <h2 class="mb-4 text-xl font-bold leading-tight dark:text-gray-300 md:text-2xl">
                                            Design
                                        </h2>
                                        <p class="text-base leading-loose text-gray-500 dark:text-gray-400">
                                            Lorem ipsum dor amet Lorem ipsum dor amet is a dummy text .Lorem ipsum dor amet isopinus
                                            ipaino
                                        </p>
                                    </div>
                                </div>
                                <div class="flex mb-4">
                        <span
                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-6 bg-indigo-500 rounded dark:bg-indigo-500 dark:text-gray-100 text-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="w-5 h-5 bi bi-file-text" viewBox="0 0 16 16">
                                <path
                                    d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                            </svg>
                        </span>
                                    <div>
                                        <h2 class="mb-4 text-xl font-bold leading-tight dark:text-gray-300 md:text-2xl">
                                            Strategy
                                        </h2>
                                        <p class="text-base leading-loose text-gray-500 dark:text-gray-400">
                                            Lorem ipsum dor amet Lorem ipsum dor amet is a dummy text .Lorem ipsum dor amet isopinus
                                            ipaino
                                        </p>
                                    </div>
                                </div>
                                <div class="flex mb-4">
                        <span
                            class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-6 bg-indigo-500 rounded dark:bg-indigo-500 dark:text-gray-100 text-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="w-5 h-5 bi bi-bank2" viewBox="0 0 16 16">
                                <path
                                    d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z">
                                </path>
                            </svg>
                        </span>
                                    <div>
                                        <h2 class="mb-4 text-xl font-bold leading-tight dark:text-gray-300 md:text-2xl">
                                            Develop
                                        </h2>
                                        <p class="text-base leading-loose text-gray-500 dark:text-gray-400">
                                            Lorem ipsum dor amet Lorem ipsum dor amet is a dummy text .Lorem ipsum dor amet isopinus
                                            ipaino
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

            </div>

        </div>
    </section>


@endsection
