<template>
    <Layout>
        <Head title="InertiaJS APP - Create Provider" />
        <H1>Edit Provider</H1>
        <div>
            <form :action="'/providers/' + provider.slug" method="POST" class="my-5" @submit.prevent="updateProvider">
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

                <button type="submit" class="btn btn-primary">Save</button>
                &nbsp;&nbsp;
                <button  type="button" class="btn btn-danger" @click="deleteProvider">Delete</button>
        </form>
        </div>

    </Layout>
</template>

<script>
import LaravelError from '../../Components/LaravelError';
import Layout from '../../Shared/Layout'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
    props: ['errors', 'provider'],
    components: {
        Head,
        Layout,
        Link,
        LaravelError
    },
    data(){
        return {
            form: {
                company_name: this.provider.company_name,
                trading_name: this.provider.trading_name,
                abn: this.provider.abn,
                address: this.provider.address,
                pc_name: this.provider.pc_name,
                pc_email: this.provider.pc_email,
                pc_phone: this.provider.pc_phone,
                sc_name: this.provider.sc_name,
                sc_email: this.provider.sc_email,
                sc_phone: this.provider.sc_phone,
            }
        }
    },
    methods:{
        updateProvider() {
            this.$inertia.patch('/providers/'+ this.provider.slug, this.form)
                .then(() => {

                });
        },
        deleteProvider() {
            if(confirm('Are you sure you want to delete this provider ?')){
                this.$inertia.delete('/providers/'+ this.provider.slug)
                    .then(() => {

                    });
            }
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

