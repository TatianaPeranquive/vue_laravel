<script>
    export default{
        name: 'CategoriesIndex'
    }
</script>

<script setup>
    import AppLayout from '@/Layouts/AuthenticatedLayout.vue'
    import { ref, watch, defineProps, initCustomFormatter } from 'vue';
    import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  categories: {
    type: Object,
    required: true
  }
});
const categories = ref(props.categories);

const deleteCategory = id => {
    confirm 

}

// Watch for changes to categories prop to keep local state in sync
watch(() => props.categories, newCategories => {
  categories.value = newCategories;
});
</script>

<template>
    <app-layout>
        <template #header>
            <h1 class="font-seibold text-xl text-gray-800 leading-tight">Categories</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <Link :href="route('categories.create')" class="text-white bg-indigo-500 hover:bg-indigo-700 py-2 px-4 rounded" >
                        CREATE CATEGORY
                        </Link>
                    </div>

                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">
                          <li class="flex justify-between gap-x-6 py-5" v-for="category in categories.data" :key="category.id">
                                <div class="flex justify-between">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{category.name}}</p>
                                </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm leading-6 text-green-500">
                                        <Link :href="route('categories.edit', categories.id)">Edit</Link>
                                        <Link @click="deleteCategory(categories.id)">Delete</Link>
                                    </p>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>
