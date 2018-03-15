import Vue from 'vue';
import VueResource from 'vue-resource';
import StepList from './components/stepList.vue';

Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('content');
var resource = Vue.resource(top.location+'/steps{/id}');
new Vue({
    el:'#app',
    data:{
        steps:[
            {name:'' ,completed:false}
        ],
        newStep:'',
        baseUrl:self.location+'/steps'
    },
    mounted:function () {
        this.fetchSteps();
    },
    components:{ StepList },
    methods:{
        fetchSteps:function () {
            resource.query().then((response)=>{
                this.steps=response.body;
        },(response)=>{
                response.status;
            });
        },
        addStep:function () {
            resource.save('',{name:this.newStep}).then((response)=>{
                this.newStep = '';
            this.fetchSteps();
        },(response)=>{
                response.status;
            });
        },
        toggleCompletion:function(step){
            resource.update({id:step.id},{opposite:!step.completed}).then((response)=>{
                this.fetchSteps();
        },(response)=>{
                response.status;
            });
        },
        removeStep:function (step) {
            resource.delete({id:step.id}).then((response)=>{
                this.fetchSteps();
        },(response)=>{
                response.status;
            });
        },
        editStep:function (step) {
            this.removeStep(step);
            this.newStep = step.name;
            this.$refs.newStep.focus();
        },
        completeAll:function () {
            this.$http.post(this.baseUrl+'/complete').then((response)=>{
                this.fetchSteps();
        },(response)=>{
                response.status;
            });
        },
        clearCompleted:function () {
            this.$http.delete(this.baseUrl+'/clear').then((response)=>{
                this.fetchSteps();
        },(response)=>{
                response.status;
            });
        },

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
    }
})