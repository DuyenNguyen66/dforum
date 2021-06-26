<template>
    <div>
        <div class="row mt-4" v-cloak v-if="count">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>{{ total_answer }}</h2>
                        </div>
                        <hr />

                        <answer-detail
                            v-for="answer in answers"
                            :answer="answer"
                            :key="answer.id"
                        ></answer-detail>

                        <!-- <div class="text-center mt-3" v-if="theNextUrl">
                            <button
                                @click.prevent="fetch(theNextUrl)"
                                class="btn btn-outline-secondary"
                            >
                                Load more answers
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <answer-form-add :question-id="question.id"></answer-form-add>
    </div>
</template>

<script>
import AnswerDetail from "./AnswerDetail.vue";
import AnswerFormAdd from "./AnswerFormAdd.vue";
export default {
    props: ["question"],

    components: { AnswerDetail, AnswerFormAdd },

    data() {
        return {
            answers: Array,
            count: Number,
        };
    },

    computed: {
        total_answer() {
            return this.count + " " + (this.count > 1 ? "Answers" : "Answer");
        },
    },

    methods: {
        getAnswers() {
            axios
                .get(`/api/question/${this.question.id}/answers`)
                .then((data) => {
                    console.log(data);
                    this.answers = data.data;
                    this.count = this.answers.length;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },

    created() {
        this.getAnswers();
    },
};
</script>