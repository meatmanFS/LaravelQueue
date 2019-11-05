<template>
    <div class="preorder-form-wrap card">
        <div class="card-header text-left">
            Preorder Confiramation Form
        </div>
        <form class="card-body" v-on:submit.prevent="addPreorder">
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" v-model="email" id="inputEmail" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" v-model="name" id="inputName" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Make Preorder</button>
                </div>
            </div>

        </form>
    </div>
</template>

<script>
    export default {
        name: "preorder-form",
        data(){
            return {
                name: '',
                email: ''
            }
        },
        methods: {
            addPreorder(){
                axios.post('/api/preorders/store',{
                    email: this.email,
                    name: this.name
                })
                    .then((response)=>{
                        this.email = '';
                        this.name = '';
                    })
                    .catch((error)=>{console.log(error)})
            }
        }
    }
</script>

