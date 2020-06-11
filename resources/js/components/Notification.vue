<template>
    <a class="dropdown-item" :class="className" href="#">
        <slot></slot>
    </a>
</template>
<script>
    export default {
        props:[
            'color'
        ],
        computed:{
            className(){
                return 'list-group-item-'+this.color;
            }
        },
        mounted() {
            console.log('Component mounted!');
        }
    }
</script>
<style>
    #notification ul {
        width: 400px;
        /*display: block;*/
        float: left;
        text-align: left;
        letter-spacing: 0.10em;
        text-transform: uppercase;
        height:250px;
        overflow-y:auto;
    }
    #notification ul .dropdown-item{
        color:gold;
        font-size:14px;
    }
</style>