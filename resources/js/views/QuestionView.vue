<template>
    <div class="container" v-if="question.id">
        <question-detail :question="question"></question-detail>
        <answers-list :question="question"></answers-list>
    </div>
</template>

<script>
import QuestionDetail from "../components/QuestionDetail.vue";
import AnswersList from "../components/AnswersList.vue";

export default {
    components: { QuestionDetail, AnswersList },

    props: ["slug"],

    data() {
        return {
            question: Object,
        };
    },

    mounted() {
        this.getQuestion();
    },

    methods: {
        getQuestion() {
            axios
                .get("/api/question/" + this.slug)
                .then((data) => {
                    // console.log(data);
                    this.question = data.data;
                })
                .catch((error) => console.log(error));
        },
    },
};
</script>