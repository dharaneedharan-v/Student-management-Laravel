<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";

const props = defineProps({
    student: Object,
    image: String,
});
const form = useForm({
    name: props.student.name,
    age: props.student.age,
    status: props.student.status,
    image: null,
});

function updateStudent() {
    const url = route("students.update", { student: props.student.id });
    router.post(url, {
        _method: "put",
        name: form.name,
        age: form.age,
        status: form.status,
        image: form.image,
    });
}
</script>

<template>
    <Head title="Students" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Students
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex m-2 p-2">
                    <Link
                        href="/students"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded"
                        >Back</Link
                    >
                </div>
                <div>
                    <!-- component -->
                    <div class="bg-grey-lighter min-h-screen flex flex-col">
                        <div
                            class="container max-w-xl mx-auto flex-1 flex flex-col items-center justify-center px-2"
                        >
                            <form
                                @submit.prevent="updateStudent"
                                class="bg-white px-6 py-8 rounded shadow-md text-black w-full"
                            >
                                <h1 class="mb-8 text-3xl text-center">
                                    Update the Student
                                </h1>

                                <label for="name">Full Name</label>
                                <input
                                    type="text"
                                    v-model="form.name"
                                    class="block mt-2 border border-grey-light w-full p-3 rounded mb-4"
                                    name="name"
                                    placeholder="Full Name"
                                />
                                <label for="age">Age</label>
                                <input
                                    type="number"
                                    v-model="form.age"
                                    class="block mt-2 border border-grey-light w-full p-3 rounded mb-4"
                                    name="age"
                                    placeholder="age"
                                />

                                <label for="status"> Status </label>

                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 py-4"
                                >
                                    <label>
                                        <input
                                            type="radio"
                                            v-model="form.status"
                                            value="1"
                                            class="peer hidden"
                                            name="status"
                                        />

                                        <div
                                            class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500"
                                        >
                                            <h2
                                                class="font-medium text-gray-700"
                                            >
                                                Active
                                            </h2>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-9 h-9 text-blue-600 invisible group-[.peer:checked+&]:visible"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                    </label>

                                    <label>
                                        <input
                                            type="radio"
                                            v-model="form.status"
                                            value="0"
                                            class="peer hidden"
                                            name="status"
                                        />

                                        <div
                                            class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500"
                                        >
                                            <h2
                                                class="font-medium text-gray-700"
                                            >
                                                Inactive
                                            </h2>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-9 h-9 text-blue-600 invisible group-[.peer:checked+&]:visible"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                    </label>
                                </div>

                                <p>Current Image</p>
                                <img
                                    :src="image"
                                    class="w-40 h-40 rounded-full mt-2 mb-4"
                                    alt=""
                                />

                                <p class="mt-4 mb-4">Update image</p>

                                <label for="image" class="sr-only"
                                    >Choose Image</label
                                >
                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    @input="form.image = $event.target.files[0]"
                                    class="block w-full mb-4 mt-4 border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:border-0 file:bg-gray-100 file:me-4 file:py-3 file:px-4"
                                />

                                <button
                                    type="submit"
                                    class="w-full text-center py-3 rounded bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none my-1"
                                >
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
