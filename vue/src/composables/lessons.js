import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";

export default function useLessons() {

    const lessons = ref([]);
    const lesson = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getLessons = async () => {
        const response = await axios.get("lessons");
        lessons.value = response.data.data;
    };

    const getLesson = async (id) => {
        const response = await axios.get("lessons" + id);
        lesson.value = response.data.data;
    };

    const storeLesson = async (data) => {
        try {
            await axios.post("lessons", data);
            await router.push({name: "LessonIndex"});
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    };

    const updateLesson = async (id) => {
        try {
            await axios.put("lessons/" + id, lesson.value)
            await router.push({name: "LessonIndex"});
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    };

    const destroyLesson = async (id) => {
        if (!window.confirm("Are you sure?")) {
            return;
        }
        await axios.delete("lesson/" + id);
        await getLessons();
    };

    return {
        lesson,
        lessons,
        getLesson,
        getLessons,
        storeLesson,
        updateLesson,
        destroyLesson,
        errors
    };
}
