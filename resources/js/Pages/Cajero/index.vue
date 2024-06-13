<script>
export default {
    name: 'CajeroIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AuthenticatedLayout.vue'
import { ref,defineProps } from 'vue';
import { usePage,Head, router } from '@inertiajs/vue3';

import Inertia from '@inertiajs/inertia';

const { $inertia } = usePage();
const monto = ref('');
const showTotal = ref(false);
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
    },
    user_id: {
        type: Number,
        required: true
    }
});


// const submitForm = () => {
//     const montoInt = parseInt(monto.value, 10);
//     //route('cajero.store').post(montoInt);
//     Inertia.post(route('store'), form.value);
// };

const continuar = () => {
    if (monto.value >= 1000 && monto.value <= 2000000) {

        const id_user = props.user_id;
        showTotal.value = true;

        router.post(route('cajero.store'), { monto: monto.value, user_id: id_user })
            .then(response => {
                alert('Retiro exitoso');
            })
            .catch(error => {
                alert('Error al procesar la solicitud: ' + error.message);
            });
    } else {
        alert('Monto debe estar entre $1.000 y $2.000.000');
    }
};


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
                                    <th class="w-1/3 px-4 uppercase">Nombre</th>
                                    <th class="w-1/3 px-4 uppercase text-sm">Saldo</th>
                                    <th v-if="showTotal" class="w-1/3 px-4 uppercase text-sm">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="w-1/3 py-3 px-4 uppercase text-center font-semibold">{{ name }}</td>
                                    <td class="w-1/3 py-3 px-4 text-center">{{ saldo }}</td>
                                    <td v-if="showTotal" class="w-1/3 py-3 px-4 text-center">{{ total }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-between items-center mt-4">
                            <div class="w-1/2 text-center">
                                <strong>¿Cuánto desea retirar?</strong>
                                <p>Monto mínimo $1.000 y máximo $2.000.000</p>
                            </div>

                               <form @submit.prevent="submitForm">
                                    <input type="number" v-model="monto" required class="text-center form-control mt-2 p-2 border rounded text-center" placeholder="Ejemplo:$1000">
                                    <button @click="continuar" class="text-white bg-indigo-400 hover:bg-indigo-700 py-2 px-4 rounded transition duration-200">
                                        CONTINUAR
                                    </button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
