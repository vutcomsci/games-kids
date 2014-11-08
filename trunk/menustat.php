
<!-- 			<canvas id="canvas" ></canvas> -->
<!-- 		</div> -->


<!-- 	<script> -->
<!-- // 	var randomScalingFactor = function(){ return Math.round(Math.random()*100)}; -->

<!-- // 	var barChartData = { -->
<!-- // 		labels : ["January","February","March","April","May","June","July"], -->
<!-- // 		datasets : [ -->
<!-- // 			{ -->
<!-- // 				fillColor : "rgba(220,220,220,0.5)", -->
<!-- // 				strokeColor : "rgba(220,220,220,0.8)", -->
<!-- // 				highlightFill: "rgba(220,220,220,0.75)", -->
<!-- // 				highlightStroke: "rgba(220,220,220,1)", -->
<!-- // 				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()] -->
<!-- // 			}, -->
<!-- // 			{ -->
<!-- // 				fillColor : "rgba(151,187,205,0.5)", -->
<!-- // 				strokeColor : "rgba(151,187,205,0.8)", -->
<!-- // 				highlightFill : "rgba(151,187,205,0.75)", -->
<!-- // 				highlightStroke : "rgba(151,187,205,1)", -->
<!-- // 				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()] -->
<!-- // 			} -->
<!-- // 		] -->

<!-- // 	} -->
<!-- // 	$(function(){ -->
<!-- // 		var ctx = document.getElementById("canvas").getContext("2d"); -->
<!-- // 		window.myBar = new Chart(ctx).Bar(barChartData, { -->
<!-- // 			responsive : true -->
<!-- // 		}); -->
<!-- // 		$("#canvas").css -->
<!-- // 	}); -->

<!-- 	</script> -->
<div style="width: 20%;margin-left:5%">
<span style="font-size: 20px;color:black">เลือกการแสดงผล</span>
<br><br>
<select class="form-control">
<option>เลือกการแสดงผลReport</option>
</select>
</div>
<br><br>
<div id="stat" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
$(function () {
    $('#stat').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Report Game'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['ครั้งที่ 1', 'ครั้งที่ 2', 'ครั้งที่ 3', 'ครั้งที่ 4', 'ครั้งที่ 5'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'คะแนน',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' คะแนน'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'ถูก',
            data: [3, 2,4]
        }, {
            name: 'ผิด',
            data: [1, 2, 0]
        }]
    });
});
		</script>