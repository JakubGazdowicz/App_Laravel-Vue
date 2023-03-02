<script setup>
    import useLessons from "@/composables/lessons";
    import {onMounted} from "vue";

    const { lessons, getLessons, destroyLesson } = useLessons();

    onMounted(() => getLessons());
</script>

<template>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Subject
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    PDF
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="lesson in lessons"
                :key="lesson.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            >
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ lesson.subject }}
                </th>
                <td class="px-6 py-4">
                    {{ lesson.description }}
                </td>
                <td class="px-6 py-4">
                    {{ lesson.image }}
                </td>
                <td class="px-6 py-4">
                    {{ lesson.pdf_url }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>
