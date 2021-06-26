<template>
    <div class="media post">
        <!-- <vote :model="answer" name="answer"></vote> -->

        <div class="media-body">
            <!-- <form
                v-show="authorize('modify', answer) && editing"
                @submit.prevent="update"
            >
                <div class="form-group">
                    <m-editor :body="body" :name="uniqueName">
                        <textarea
                            rows="10"
                            v-model="body"
                            class="form-control"
                            required
                        ></textarea>
                    </m-editor>
                </div>
                <button class="btn btn-primary" :disabled="isInvalid">
                    Update
                </button>
                <button
                    class="btn btn-outline-secondary"
                    @click="cancel"
                    type="button"
                >
                    Cancel
                </button>
            </form> -->
            <div>
                <div>{{ answer.body }}</div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <user-info :model="answer" label="Answered"></user-info>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UserInfo from "./UserInfo";

export default {
    props: ["answer"],

    components: { UserInfo },
};
</script>