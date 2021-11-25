<template>
    <Layout>
        <Head title="InertiaJS APP - Create Provider" />
        <H1>Add Provider</H1>
        <div>
            <form action="/providers" method="POST" class="my-5" @submit.prevent="createProvider">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" placeholder="Company Name" v-model="form.company_name" v-bind:class="{ error: errors.company_name }">
                            <LaravelError :field="errors.company_name" />
                        </div>
                        <div class="form-group">
                            <label for="trading_name">Trading Name</label>
                            <input type="text" class="form-control" id="trading_name" placeholder="Trading Name" v-model="form.trading_name" v-bind:class="{ error: errors.trading_name }">
                            <LaravelError :field="errors.trading_name" />
                        </div>
                        <div class="form-group">
                            <label for="abn">ABN No *</label>
                            <input type="text" class="form-control" id="abn" placeholder="ABN No" v-model="form.abn" v-bind:class="{ error: errors.abn }">
                            <LaravelError :field="errors.abn" />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" v-model="form.address" v-bind:class="{ error: errors.address }">
                            <LaravelError :field="errors.address" />
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6">
                        <h4>Primary Contact</h4>
                        <div class="form-group">
                            <label for="pc_name">Name</label>
                            <input type="text" class="form-control" id="pc_name" placeholder="Name" v-model="form.pc_name" v-bind:class="{ error: errors.pc_name }">
                            <LaravelError :field="errors.pc_name" />
                        </div>
                        <div class="form-group">
                            <label for="pc_email">Email</label>
                            <input type="text" class="form-control" id="pc_email" placeholder="Email" v-model="form.pc_email" v-bind:class="{ error: errors.pc_email }">
                            <LaravelError :field="errors.pc_email" />
                        </div>
                        <div class="form-group">
                            <label for="pc_phone">Phone Number</label>
                            <input type="text" class="form-control" id="pc_phone" placeholder="Phone" v-model="form.pc_phone" v-bind:class="{ error: errors.pc_phone }">
                            <LaravelError :field="errors.pc_phone" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Secondary Contact</h4>
                        <div class="form-group">
                            <label for="sc_name">Name</label>
                            <input type="text" class="form-control" id="sc_name" placeholder="Name" v-model="form.sc_name" v-bind:class="{ error: errors.sc_name }">
                            <LaravelError :field="errors.sc_name" />
                        </div>
                        <div class="form-group">
                            <label for="sc_email">Email</label>
                            <input type="text" class="form-control" id="sc_email" placeholder="Email" v-model="form.sc_email" v-bind:class="{ error: errors.sc_email }">
                            <LaravelError :field="errors.sc_email" />
                        </div>
                        <div class="form-group">
                            <label for="sc_phone">Phone Number</label>
                            <input type="text" class="form-control" id="sc_phone" placeholder="Phone" v-model="form.sc_phone" v-bind:class="{ error: errors.sc_phone }">
                            <LaravelError :field="errors.sc_phone" />
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>

    </Layout>
</template>

<script>
import LaravelError from '../../Components/LaravelError';
import Layout from '../../Shared/Layout'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
    props: ['errors'],
    components: {
        Head,
        Layout,
        Link,
        LaravelError
    },
    data(){
        return {
            form: {
                company_name:'',
                trading_name:'',
                abn:'',
                address:'',
                pc_name:'',
                pc_email:'',
                pc_address:'',
                sc_name:'',
                sc_email:'',
                sc_address:'',
            }
        }
    },
    methods:{
        createProvider() {
            this.$inertia.post('/providers', this.form)
                .then(() => {

                });
        }
    }
}
</script>

<style>
    .form-group label{
        margin-bottom: 5px;
    }
    .form-group input{
        margin-bottom: 5px;
    }
    .error{
        border-color: red;
    }
    .btn{
        margin-top: 20px;
    }
</style>

