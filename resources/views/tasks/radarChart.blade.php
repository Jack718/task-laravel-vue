<script>
    $(document).ready(function () {
        var cxtRadar = $('#radarChart');
        var data = {
            labels: ["任务总数", "未完成", "完成"],
            datasets: [
                <?php
                    $i = 1;
                    foreach ($projects as $project):
                    $name = $project->name;
                    $totalPP = $project->tasks()->count();
                    $toDoPP = $project->tasks()->where('completed',0)->count();
                    $donePP = $project->tasks()->where('completed',1)->count();
                    echo '{';
                ?>
                    label: "<?php echo $name?>",
                    backgroundColor: "{{ randColor() }}" ,
                    borderColor: "{{ randColor() }}",
                    pointBackgroundColor: "{{ randColor() }}",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    data: [ <?php echo $totalPP . ',' . $toDoPP . ',' . $donePP ?> ]

                    <?php
                        $i == $projects->count() ? print "}" : print "},";
                        $i++;
                        endforeach;
                    ?>
            ]
        };
        var options = {
            responsive:true,
            title:{
                display:true,
                text:"项目之间的完成情况"
            },
            legend:{
                display:true,
                position:"bottom"
            }

        }
        var myRadarChart = new Chart(cxtRadar, {
            type: 'radar',
            data: data,
            options: options
        });
    })

</script>