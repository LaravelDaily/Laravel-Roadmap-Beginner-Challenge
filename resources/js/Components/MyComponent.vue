<!-- resources/js/Components/MyComponent.vue -->
<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 w-full">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Category</th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Photo</th>
                            <th colspan="2" scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ message }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ message }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">{{ message }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300"><button @click="changeMessage">Click Me</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const message = ref('Hello from Vue Component!');

const changeMessage = () => {
    message.value = 'Message changed!';
};
</script>

<style scoped>

</style>
