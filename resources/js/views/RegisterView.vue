<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sign up</div>
                    <div class="card-body">
                        <form @submit.prevent="register">
                            <div class="form-group row">
                                <label
                                    for="email_address"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >Fullname</label
                                >
                                <div class="col-md-6">
                                    <input
                                        type="text"
                                        v-model="form.name"
                                        class="form-control"
                                        name="email-address"
                                        required
                                        autofocus
                                    />
                                </div>
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
                                        v-model="form.email"
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
                                        v-model="form.password"
                                        class="form-control"
                                        name="password"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Sign up
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
            form: {
                name: "",
                email: "",
                password: "",
            },
        };
    },

    methods: {
        register() {
            return this.$store.dispatch("register", this.form);
        },
    },
};
</script>