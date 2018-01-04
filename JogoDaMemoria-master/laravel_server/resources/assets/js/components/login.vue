<template>
    <div class="jumbotron">
        <h2>Login</h2>
        <div class="form-group">
            <label for="username">Email</label>
            <input type="email" class="form-control" name="username" v-model"username" placeholder="Email address" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" v-model"password" placeholder="Enter Password" name="password" required>
        </div>
        
        <div class="form-group">
            <a class="btn btn-default" v-on:click.prevent="login()">Login</a>
            <!-- <a class="btn btn-default" v-on:click.prevent="cancelEdit()">Cancel</a> -->
        </div>
    </div>		
</template>
<script type="text/javascript">
    module.exports={
        methods: {
            login: function(){
                axios.post('api/login/',{
                    email: this.username,
                    password: this.password
                }).then(function (response){
                    console.log(response)
                }).catch(function (error) {
                    console.log(error);
                });
            }       
        },
        mounted() {
            
        }
    }
</script>

<style scoped>  

</style>