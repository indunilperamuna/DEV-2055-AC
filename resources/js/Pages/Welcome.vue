<template>
    <Layout>
        <Head title="Welcome" />
        <H1>Welcome</H1>
        <p>Hello {{ user.name }}, welcome to your first Inertia app!</p>
    </Layout>
</template>

<script>
import Layout from '../Shared/Layout'
import { Head } from '@inertiajs/inertia-vue3'

export default {
    components: {
        Head,
        Layout,
    },
    props: {
        user: Object,
    },
}
</script>
