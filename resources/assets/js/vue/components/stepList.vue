<template>
    <div class="col-md-4 col-md-offset-1">
        <div class="panel panel-default" v-if="show">
            <div class="panel-heading">
                <h2 v-if="remaings.length && type == 'remaings'">
                    待完成的步骤({{ remaings.length }})
                    <span class="btn btn-sm btn-info" @click="completeAll">完成所有</span>
                </h2>
                <h2 v-if="completions.length && type == 'completed' ">
                    已完成的步骤({{ completions.length }})
                    <span class="btn btn-sm btn-danger" @click="clearCompleted">清除所有已完成</span>
                </h2>
            </div>
            <div class="panel-body">
                <ul class="list-group" >
                    <transition-group>
                        <li class="list-group-item" v-for="step in typeSwitch">
                            <span @dblclick='editStep(step)'>{{ step.name }}</span>
                            <span class="pull-right">
                                <i class="fa fa-check" @click="toggleCompletion(step)"></i>
                                <i class="fa fa-close" @click="removeStep(step)"></i>
                            </span>
                        </li>
                    </transition-group>

                </ul>
            </div>
        </div>
        <div class="panel panel-default" v-if="type == 'remaings'">
            <div class="panel-heading">
                <form @submit.prevent="addStep"  class="form">
                    <div class="form-group ">
                        <label v-if="!newStep">完成该任务(Task)需要哪些步骤(Step)呢？</label>
                        <input type="text" v-model="newStep" ref="newStep" class="form-control" placeholder="I need to...">
                    </div>
                    <div class="form-group ">
                        <button type="submit" v-if="newStep" class="btn btn-primary">添加步骤</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        props:['steps','type'],
        data:function () {
           return {
               newStep:''
           }
        },
        methods:{
            editStep:function (step) {
                this.$emit('edit',step);
            },
            toggleCompletion:function (step) {
                this.$emit('toggle',step);
            },
            removeStep:function (step) {
                this.$emit('remove',step);
            },
            addStep:function () {
                this.$emit('new',this.newStep);
                this.newStep = '';
            },
            completeAll:function () {
                this.$emit('complete');
            },
            clearCompleted:function () {
                this.$emit('clear');
            },
            editStep:function (step) {
                this.removeStep(step);
                this.newStep = step.name;
                this.$refs.newStep.focus();
            }
        },
        computed:{
            completions:function () {
                return this.steps.filter(function (step) {
                    return step.completed;
                })
            },
            remaings:function () {
                return this.steps.filter(function (step) {
                    return !step.completed;
                })
            },
            typeSwitch:function () {
                var vm = this;
                if(vm.type == 'remaings'){
                    return vm.remaings;
                }
                return vm.completions;
            },
            show:function () {
                var case1 = this.remaings.length && this.type=='remaings';
                var case2 = this.completions.length && this.type=='completed';
                if (case1 || case2){
                    return true;
                }
            }
        }
    }
</script>

<style scoped>

</style>