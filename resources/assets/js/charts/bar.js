/**
 * Created by asher on 2017/3/6.
 */
var ctxBar = $('#barChart');
var data = {
    labels: $("#bar-data").data('name'),
datasets: [
    {
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255,99,132,1)',
        borderWidth: 1,
        data: $("#bar-data").data('counts'),
    }
]
};

var optionsBar = {
    responsive:true,
    title:{
        display:true,
        text:"项目之间的任务总数对比"
    },
    legend:{
        display:false
    }

}

var myBarChart = new Chart(ctxBar, {
    type: 'bar',
    data: data,
    options: optionsBar
});