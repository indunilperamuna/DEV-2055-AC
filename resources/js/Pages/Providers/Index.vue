<template>
    <Layout>
        <Head title="InertiaJS APP - Providers" />
        <H1>Providers</H1>
        <p></p>
        <div v-if="successMessage" class="alert alert-success mt-4">
            {{ successMessage }}
        </div>
        <div style="text-align: right; margin-bottom: 10px;">
            <Link class="btn btn-lg btn-primary" :href="'/providers/create'" role="button">Add Provider</Link>
        </div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Trading Name</th>
                        <th scope="col">ABN No</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="provider in providers" :key="provider.slug">
                        <td >{{  provider.trading_name }}</td>
                        <td >{{  provider.abn }}</td>
                        <td ><a :href="'https://www.google.com/maps/search/' +  provider.address" target="_blank">{{  provider.address }}</a></td>
                        <td> {{ transformStatus(provider.status)}}</td>
                        <td >
                            <Link :href="'/providers/' + provider.slug + '/edit'"> Edit</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </Layout>
</template>

<script>
import Layout from '../../Shared/Layout'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        Head,
        Layout,
        Link
    },
    props: ['successMessage', 'providers'],
    methods:{
        transformStatus : function (status){
            if(status == 'incomplete'){
                return 'Incomplete';
            }
            return 'Active';
        }
    }
}
</script>

