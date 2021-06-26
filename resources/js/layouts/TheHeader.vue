<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="wrapper">
            <a class="navbar-brand" href="#">Navbar</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <router-link to="/">Home</router-link>
                    </li>
                </ul>
                <form class="form-inline mr-auto my-2 my-lg-0">
                    <input
                        class="form-control mr-sm-2"
                        type="search"
                        placeholder="Search"
                    />
                    <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                    >
                        Search
                    </button>
                </form>
                <div class="user-info">
                    <a href="#">
                        <!-- <router-link to="/user-info">{{
                            $auth.user().name
                        }}</router-link> -->
                        <router-link to="/login">Sign in</router-link>
                        <router-link to="/register">Sign up</router-link>
                        <span v-if="isLoggedIn">
                            <a>Logout</a>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    computed: {
        isLoggedIn: function () {
            return this.$store.getters.isAuthenticated;
        },
    },
};
</script>
