<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sign in</div>
                    <div class="card-body">
                        <form @submit.prevent="login">
                            <div
                                v-if="errorMess != ''"
                                class="alert alert-danger"
                                role="alert"
                            >
                                {{ errorMess }}
                            </div>
                            <div class="form-group row">
                                <label
                                    for="email_address"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >E-Mail Address</label
                                >
                                <div class="col-md-6">
                                    <input
                                        type="text"
                                        v-model="user.email"
                                        class="form-control"
                                        name="email-address"
                                        required
                                        autofocus
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="password"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >Password</label
                                >
                                <div class="col-md-6">
                                    <input
                                        type="password"
                                        v-model="user.password"
                                        class="form-control"
                                        name="password"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        login() {
            this.$store.dispatch("login", this.user).then(() => {
                this.$router.push("/");
            });
        },
    },

    computed: {
        errorMess() {
            return this.$store.getters.StateError;
        },
    },
};
</script>
