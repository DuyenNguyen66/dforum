import Vue from 'vue';
import Router from 'vue-router';

import QuestionsView from '@/views/QuestionsView.vue';
import QuestionView from '@/views/QuestionView.vue';
import QuestionFormCreate from '@/components/QuestionFormCreate.vue';
import QuestionFormEdit from '@/components/QuestionFormEdit.vue';
import LoginView from '@/views/LoginView.vue';
import RegisterView from '@/views/RegisterView.vue';
import AccountView from '@/views/AccountView.vue';

Vue.use(Router);

export default new Router({
    routes: [{
            path: '/',
            name: 'home',
            component: QuestionsView,

        },
        {
            path: '/question-create',
            name: 'questions.create',
            component: QuestionFormCreate,
            meta: {
                auth: true
            }
        },
        {
            path: '/question-edit',
            name: 'questions.edit',
            component: QuestionFormEdit,
            meta: {
                auth: true
            }
        },
        {
            path: '/question/:slug',
            name: 'questions.show',
            component: QuestionView,
            props: true
        },
        {
            path: '/login',
            name: 'login',
            component: LoginView,
            meta: {
                auth: false
            }
        },
        {
            path: '/register',
            name: 'register',
            component: RegisterView
        },
        {
            path: '/user-info',
            name: 'user.show',
            component: AccountView
        }
    ]
});