<template>
   <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>face</th>
                <th>active</th>
                
            </tr>
        </thead>
        <tbody>

            <tr v-for="imag in image">
                <td>{{ imag.id }}</td>
                <td>{{ imag.face }}</td>
                <td>{{ imag.active}}</td>
                <th><img v-bind:src="ImageURL(imag.path)" ></th>
                
            </tr>
        </tbody>
    </table>
</template>

<script type="text/javascript">
    // Component code (not registered)
    // 
    module.exports={
        props: ['image'],
        data: function(){
            return { 

                
            }
        },
        methods: {
            ImageURL: function (imag) {
                var imgSrc = String(imag);
                return 'img/' + imgSrc ;
            }
           
        },
          mounted() {
            console.log(this.image);
            
        }
    }
</script>

<style scoped>
    tr.activerow {
        background: #123456  !important;
        color: #fff          !important;
}

</style>


