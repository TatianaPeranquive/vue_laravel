<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Bienvenida Tatiana!</div>

                  <button v-if="$page.props.user.permissions.includes('create roles')">Create permissions</button>
                  <button v-if="$page.props.user.permissions.includes('create lesson')">Create new lesson</button>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style>
button{
    background-color: aqua;
    color: rgb(29, 29, 8);
    padding: 20px;
    margin: 50px;
    }
</style>
