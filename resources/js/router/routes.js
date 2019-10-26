function page (path) {
    return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
    { path: '/', name: 'welcome', component: page('welcome.vue') },
    { path: '/terms', name: 'terms', component: page('terms.vue') },
    { path: '/privacy', name: 'privacy', component: page('privacy.vue') },

    { path: '/login', name: 'login', component: page('auth/login.vue') },
    { path: '/register', name: 'register', component: page('auth/register.vue') },
    { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
    { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
    { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
    { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

    { path: '/home', name: 'home', redirect: { name: 'welcome' } },

    // Products
    { path: '/products',
        component: page('products/index.vue'),
        children: [
            { path: '', redirect: { name: 'products.products' } },
            { path: '', name: 'products.products', component: page('products/products.vue') },
            { path: ':id', name: 'products.show', component: page('products/show.vue') },
            { path: 'create',
                name: 'products.create',
                component: page('products/create.vue'),
                meta: {
                    middleware: 'admin'
                }
            },
            { path: 'edit/:id',
                name: 'products.edit',
                component: page('products/edit.vue'),
                meta: {
                    middleware: 'admin'
                }
            }
        ]
    },

    // Houses
    { path: '/houses',
        component: page('houses/index.vue'),
        children: [
            { path: '', redirect: { name: 'houses.houses' } },
            { path: '', name: 'houses.houses', component: page('houses/houses.vue') },
            { path: ':id', name: 'houses.show', component: page('houses/show.vue') },
            { path: 'create',
                name: 'houses.create',
                component: page('houses/create.vue'),
                meta: {
                    middleware: 'admin'
                }
            },
            { path: 'edit/:id',
                name: 'houses.edit',
                component: page('houses/edit.vue'),
                meta: {
                    middleware: 'admin'
                }
            }
        ]
    },

    { path: '/settings',
        component: page('settings/index.vue'),
        children: [
            { path: '', redirect: { name: 'settings.profile' } },
            { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
            { path: 'password', name: 'settings.password', component: page('settings/password.vue') },
            { path: 'manage',
                name: 'settings.manage',
                component: page('settings/manage.vue'),
                meta: {
                    middleware: 'admin'
                } }
        ] },

    { path: '*', component: page('errors/404.vue') }
]
