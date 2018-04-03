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
    components:{
        StepList:StepList
    },
    methods:{
        fetchSteps:function () {
            resource.query().then((response)=>{
                this.steps=response.body;
        },(response)=>{
                response.status;
            });
        },
        addStep:function (step) {
            resource.save('',{name:step}).then((response)=>{
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
        }
    }
})