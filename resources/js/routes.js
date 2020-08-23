import Home from './components/Home'
import ItemsList from './components/items/List'
import FormAccess from './components/auth/Form'
import UserAccount from './components/AccountSetting'

export const routes = [
    {
        path: '/',
        component: Home,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: '',
                component: ItemsList
            },
        ]
    },
    {
        path: '/login',
        component: FormAccess
    },
    {
        path: '/register',
        component: FormAccess
    },
    {
        path: '/settings',
        component: UserAccount
    },
    {
        path: '/:id',
    }
]
