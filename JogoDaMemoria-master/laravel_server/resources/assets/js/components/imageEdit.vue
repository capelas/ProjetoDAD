<template>
    <div class="jumbotron">
        <h2>Edit Image</h2>
        
        
        <div class="form-group">
            <label for="inputAtive">NickName</label>
            <input
                type="text" class="form-control" v-model="user.nickname"
                name="nickname" id="inputNickname"
                placeholder="nickname"/>
        </div>
        
        <div class="form-group">
            <a class="btn btn-default" v-on:click.prevent="saveUser()">Save</a>
            <a class="btn btn-default" v-on:click.prevent="cancelEdit()">Cancel</a>
        </div>
    </div>
</template>

<script type="text/javascript">
    module.exports={
        props: ['user'],
        methods: {
            saveUser: function(){
                axios.put('api/users/'+this.user.id, this.user)
                    .then(response=>{
                        // Copy object properties from response.data.data to this.user
                        // without creating a new reference
                        // 
                        Object.assign(this.user, response.data.data);
                        this.$emit('user-saved', this.user)
                    });
            },
            cancelEdit: function(){
                axios.get('api/users/'+this.user.id)
                    .then(response=>{
                        // Copy object properties from response.data.data to this.user
                        // without creating a new reference
                        Object.assign(this.user, response.data.data);
                        this.$emit('user-canceled', this.user);
                    });
            }
        },
        mounted() {
            
        }
    }
</script>

<style scoped>  

</style>