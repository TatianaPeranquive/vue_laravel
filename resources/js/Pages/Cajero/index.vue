<script>
export default {
    name: 'CajeroIndex'
}
</script>

<script setup>
    import AppLayout from '@/Layouts/AuthenticatedLayout.vue'
    import { ref, watch, defineProps, initCustomFormatter } from 'vue';
    import { Head, Link } from '@inertiajs/vue3';

    const props = defineProps({
        name: {
        type: String,
        required: true
        },
        saldo: {
        type: Number,
        required: true
        },
        total: {
        type: Array,
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
                    <div class="mt-4">
                        <table class="min-w-full bg-white">
                            <thead class="bg-indigo-400 text-white">
                                <tr>
                                    <th class="w-1/2 px-4 uppercase  ">Nombre</th>
                                    <th class="w-1/2 px-4 uppercase  text-sm">Saldo</th>
                                    <th class="w-1/2 px-4 uppercase  text-sm">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">

                                <tr>
                                    <!-- <td class="w-1/2 py-3 px-4 uppercase text-center font-semibold">{{ name }}</td>
                                    <td class="w-1/2 py-3 px-4 text-center">{{ saldo }}</td> -->
                                      <td class="w-1/2 py-3 px-4 text-center">{{ total }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-between items-center mt-4">
                            <div class="w-1/2 text-center">
                                <strong>¿Cuánto desea retirar?</strong>
                                <p>Monto mínimo $1.000 y máximo $2.000.000</p>

                            </div>

                            <div class="w-1/2">
                                <input type="text" name="doc_nombre" class="text-center form-control mt-2 p-2 border rounded text-center" id="doc_nombre" placeholder="00000">
                            </div>
                            <Link :href="route('cajero.create')" class=" text-white bg-indigo-400 hover:bg-indigo-700 py-2 px-4 rounded transition duration-200">
                                CONTINUAR
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
