<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MetricsLogo from "@/Components/MetricsLogo.vue";
import { Head } from "@inertiajs/vue3";
const props = defineProps([
    "totalStudents",
    "activeStudents",
    "inactiveStudents",
    "newStudentsDaily",
    "newStudentsWeekly",
    "newStudentsMonthly",
]);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="p-6 text-gray-900 flex items-center">
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-20 gap-y-10"
                        >
                            <div
                                class="max-w-xl p-6 bg-white border-4 border-red-300 rounded-lg shadow-md"
                            >
                                <MetricsLogo />

                                <h5
                                    class="mb-2 mt-4 text-2xl font-semibold tracking-tight text-gray-900"
                                >
                                    Total Students
                                </h5>

                                <p
                                    class="mb-3 text-5xl mt-4 font-normal text-gray-500"
                                >
                                    {{ totalStudents }}
                                </p>
                            </div>
                            <div
                                class="max-w-xl p-6 bg-white border-4 border-blue-300 rounded-lg shadow-md"
                            >
                                <MetricsLogo />

                                <h5
                                    class="mb-2 mt-4 text-2xl font-semibold tracking-tight text-gray-900"
                                >
                                    Active Students
                                </h5>

                                <p
                                    class="mb-3 text-5xl mt-4 font-normal text-gray-500"
                                >
                                    {{ activeStudents }}
                                </p>
                            </div>
                            <div
                                class="max-w-xl p-6 bg-white border-4 border-pink-300 rounded-lg shadow-md"
                            >
                                <MetricsLogo />

                                <h5
                                    class="mb-2 mt-4 text-2xl font-semibold tracking-tight text-gray-900"
                                >
                                    Inactive Students
                                </h5>

                                <p
                                    class="mb-3 text-5xl mt-4 font-normal text-gray-500"
                                >
                                    {{ inactiveStudents }}
                                </p>
                            </div>
                            <div
                                class="max-w-xl p-6 bg-white border-4 border-indigo-300 rounded-lg shadow-md"
                            >
                                <MetricsLogo />

                                <h5
                                    class="mb-2 mt-4 text-2xl font-semibold tracking-tight text-gray-900"
                                >
                                    New Students (Daily)
                                </h5>

                                <p
                                    class="mb-3 text-5xl mt-4 font-normal text-gray-500"
                                >
                                    {{ newStudentsDaily }}
                                </p>
                            </div>
                            <div
                                class="max-w-xl p-6 bg-white border-4 border-green-300 rounded-lg shadow-md"
                            >
                                <MetricsLogo />

                                <h5
                                    class="mb-2 mt-4 text-2xl font-semibold tracking-tight text-gray-900"
                                >
                                    New Students (Monthly)
                                </h5>

                                <p
                                    class="mb-3 text-5xl mt-4 font-normal text-gray-500"
                                >
                                    {{ newStudentsMonthly }}
                                </p>
                            </div>
                            <div
                                class="max-w-xl p-6 bg-white border-4 border-teal-300 rounded-lg shadow-md"
                            >
                                <MetricsLogo />

                                <h5
                                    class="mb-2 mt-4 text-2xl font-semibold tracking-tight text-gray-900"
                                >
                                    New Students (Weekly)
                                </h5>

                                <p
                                    class="mb-3 text-5xl mt-4 font-normal text-gray-500"
                                >
                                    {{ newStudentsWeekly }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
