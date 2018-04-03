<template>
    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" v-model="searchString" @focus="fetchTasks" @blur="leave" placeholder="Search">
                <div class="input-group-addon"><i class="fa fa-search">

                </i></div>
            </div>
        </div>
        <ul class="list-group search-list" v-if="show">
            <li class="list-group-item" v-for="task in searchFor">
                <a :href="link(task)"><p>
                    {{ task.title }}
                </p></a>
            </li>
        </ul>
    </form>
</template>
<script>
    export default{
        data:function () {
            return {
                tasks:[],
                searchString:'',
                show:true,
            }
        },
        methods:{
            fetchTasks:function () {
                this.$http.get('/tasks/searchApi').then((response)=>{
                    this.show = true;
                    this.tasks = response.body
                },(response)=>{

                })
            },
            leave:function () {
                let vm = this;
                setTimeout(function () {
                    vm.show = false;
                },2000)
            },
            link:function (task) {
                return '/tasks/'+task.id;
            }
        },
        computed: {
            searchFor:function () {
                this.searchString = this.searchString.trim().toLowerCase();
                let vm = this;
                return this.tasks.filter(function (task) {
                    if(task.title.indexOf(vm.searchString) !== -1){
                        return task;
                    }
                });
            }
        },
    }
</script>
<style>
    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
        height: 3em;
    }
    .navbar-form .search-list{
        max-height: 30em;
        overflow: auto;
    }
</style>