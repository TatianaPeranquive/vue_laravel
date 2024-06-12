<script>
export default {
    name: 'CajeroIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AuthenticatedLayout.vue'
import { ref, watch, defineProps } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
const props = defineProps({
  categories: {
    type: Object,
    required: true
  }
});
</script>

<template>
    <app-layout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Cajero</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200 rounded-lg shadow-md">
                    <div class="flex justify-between mb-4">
                        <Link :href="route('cajero.create')" class="text-white bg-indigo-500 hover:bg-indigo-700 py-2 px-4 rounded transition duration-200">
                            CONTINUAR
                        </Link>
                    </div>

                    <div class="mt-4">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/2  px-1 uppercase font-semibold text-sm">Nombre</th>
                                    <th class="w-1/2 px-1 uppercase font-semibold text-sm">Saldo</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="w-1/2 py-3 px-4">Anggy Peranquive</td>
                                    <td class="w-1/2 py-3 px-4">$500.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
