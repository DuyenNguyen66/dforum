<template>
    <div>
        <div class="card-body">
            <spinner v-if="$root.loading"></spinner>
            <div
                v-for="question in questions"
                :key="question.id"
                class="media post"
            >
                <div class="d-flex flex-column counters">
                    <!-- <div class="vote">
                        <strong>{{ question.votes_count }}</strong>
                        {{ str_plural("vote", question.votes_count) }}
                    </div> -->
                    <!-- <div :class="statusClasses">
                        <strong>{{ question.answers_count }}</strong>
                        {{ str_plural("answer", question.answers_count) }}
                    </div> -->
                    <div class="view">{{ question.views }} views</div>
                </div>
                <div class="media-body">
                    <div class="d-flex align-items-center">
                        <h3 class="mt-0">
                            <router-link
                                :to="{
                                    name: 'questions.show',
                                    params: { slug: question.slug },
                                }"
                                >{{ question.title }}</router-link
                            >
                        </h3>
                        <div class="ml-auto">
                            <router-link
                                :to="{
                                    name: 'questions.edit',
                                    params: { id: question.id },
                                }"
                                class="btn btn-sm btn-outline-info"
                                >Edit
                            </router-link>
                            <button class="btn btn-sm btn-outline-danger">
                                Delete
                            </button>
                        </div>
                    </div>
                    <p class="lead">
                        Asked by
                        <a href="#">{{ question.user.name }}</a>
                        <small class="text-muted">{{
                            question.created_date
                        }}</small>
                    </p>
                </div>
            </div>
        </div>
        <!-- <div class="card-footer">
            <pagination :meta="meta" :links="links"></pagination>
        </div> -->
    </div>
</template>

<script>
import Pagination from "./Pagination.vue";
export default {
    components: { Pagination },
    data() {
        return {
            questions: Array,
            meta: Object,
            links: Object,
        };
    },
    created() {
        this.getQuestions();
    },
    methods: {
        getQuestions() {
            axios.get("/api/questions").then((data) => {
                this.questions = data.data;
                // this.links = data.links;
                // this.meta = data.meta;
            });
        },
    },
};
</script>
