<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ question.title }}</h1>
                            <div class="ml-auto">
                                <router-link
                                    exact
                                    :to="{ name: 'home' }"
                                    class="btn btn-outline-secondary"
                                    >Back to all Questions</router-link
                                >
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="media">
                        <!-- <vote :model="question" name="question"></vote> -->

                        <div class="media-body">
                            <!-- <div v-html="bodyHtml" ref="bodyHtml"></div> -->
                            <div>
                                {{ question.body }}
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <!-- <div class="ml-auto">
                                        <a class="btn btn-sm btn-outline-info"
                                            >Edit</a
                                        >
                                        <button
                                            class="
                                                btn btn-sm btn-outline-danger
                                            "
                                        >
                                            Delete
                                        </button>
                                    </div> -->
                                </div>
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <user-info
                                        :model="question"
                                        label="Asked"
                                    ></user-info>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UserInfo from "./UserInfo";
export default {
    props: ["question"],
    components: { UserInfo },
};
</script>