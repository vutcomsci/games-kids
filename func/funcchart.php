<style>
.highcharts-contextmenu div,.highcharts-button{
display:none;
}
</style>
<?php 
require_once 'connect.php';
if($_GET["typechart"]!=0){
if($_GET["temp"]>0){
	$typechart=$_GET["typechart"];
}else{
	$typechart=4;	
}
//echo $_GET["temp"]."xx";
switch($_GET["typechart"]){
	case 1:$title="ทายภาพจากเสียง";break;
	case 2:$title="จับคู่เสียงกับภาพ";break;
	case 3:$title="ทำตามคำบอก";break;
}
$nullY=1;
switch($typechart){
	
	case 1:
		$sql="select * from gamestest,gamesexamination where gamestest.games_exa_id=
				gamesexamination.games_exa_id and gamesexamination.games_types_id=1  and gamestest.games_ch_id=".$_GET["temp"];
		
		break;
	case 2:
		$sql="select * from gamestest,gamesexamination where gamestest.games_exa_id=
				gamesexamination.games_exa_id and gamesexamination.games_types_id=2  and gamestest.games_ch_id=".$_GET["temp"];
	
		break;
	case 3:
		$sql="select * from gamestest,gamesexamination where gamestest.games_exa_id=
				gamesexamination.games_exa_id and gamesexamination.games_types_id=3  and gamestest.games_ch_id=".$_GET["temp"];
		
		break;

	case 4:
			$sql="select * from gamestest,gamesexamination where gamestest.games_exa_id=
				gamesexamination.games_exa_id and gamesexamination.games_types_id=".$_GET["typechart"]." ";
		
			break;		
}
$query=mysql_query($sql);
$i=0;
//echo $sql;
while($resulttest=mysql_fetch_array($query)){
	$nullY=0;
	if($typechart<4){
		
	$sqlcorrect="select count(games_des_id) AS countCorrect from gamesdes where games_score=1 and games_test_id=".$resulttest["games_test_id"];	
	$querycorrect=mysql_query($sqlcorrect);
	//echo $sqlcorrect;
	$resultcorrect=mysql_fetch_array($querycorrect);
	
	$sqlNotcorrect="select count(games_des_id) AS countCorrect from gamesdes where games_score=0 and games_test_id=".$resulttest["games_test_id"];
	$queryNotcorrect=mysql_query($sqlNotcorrect);
	//echo $sqlcorrect;
	$resultNotcorrect=mysql_fetch_array($queryNotcorrect);
	$atPer[$i]='"ครั้งที่'.($i+1).' Level'.$resulttest["games_types_lv"].'"';
	$valCorrect[$i]=$resultcorrect["countCorrect"];
	$valNotCorrect[$i]=$resultNotcorrect["countCorrect"];
	//echo $valCorrect[$i]."<hr/>";
	if($_GET["typechart"]==3){
		$sqlClick="select games_score from gamesdes where games_descrip=-1 and games_test_id=".$resulttest["games_test_id"];
		$queryClick=mysql_query($sqlClick);
		//echo $sqlcorrect;
		$resultClick=mysql_fetch_array($queryClick);
		$valClick[$i]=$resultClick["games_score"];
	}
	}else{
		$y=0;
		while($y<6){
		if($_GET["typechart"]==3){
			$sqlClick="select sum(games_score) AS sumD,count(gamestest.games_test_id) AS countT from gamesdes,gamestest ,gamesexamination
				where  gamesdes.games_test_id=gamestest.games_test_id  
                and gamesexamination.games_exa_id=gamestest.games_exa_id
				and gamesexamination.games_types_id=".$resulttest["games_types_id"]."
                and gamesexamination.games_types_lv=".($y+1)."
                and  games_descrip=-1";
			$queryClick=mysql_query($sqlClick);
			//echo $sqlClick."<hr/>";
			$resultClick=mysql_fetch_array($queryClick);
			$c=$resultClick["countT"];
			if($c==0){$c=1;}
			$valClick[$y]=$resultClick["sumD"]/$c;
		}
				$sqlcorrect="select count(games_des_id) AS countCorrect from gamesdes,gamestest ,gamesexamination
				where  gamesdes.games_test_id=gamestest.games_test_id  
                and gamesexamination.games_exa_id=gamestest.games_exa_id
				and gamesexamination.games_types_id=".$resulttest["games_types_id"]."
                and gamesexamination.games_types_lv=".($y+1)."
                and  games_score=1 ";
				$querycorrect=mysql_query($sqlcorrect);
				//echo $sqlcorrect;
				$resultcorrect=mysql_fetch_array($querycorrect);
		
				$sqlNotcorrect="select count(games_des_id) AS countCorrect from gamesdes,gamestest ,gamesexamination
				where  gamesdes.games_test_id=gamestest.games_test_id  
                and gamesexamination.games_exa_id=gamestest.games_exa_id
				and gamesexamination.games_types_id=".$resulttest["games_types_id"]."
                and gamesexamination.games_types_lv=".($y+1)."
                and  games_score=0 ";
				$queryNotcorrect=mysql_query($sqlNotcorrect);
				//echo $sqlcorrect;
				$resultNotcorrect=mysql_fetch_array($queryNotcorrect);
				$sum=$resultcorrect["countCorrect"]+$resultNotcorrect["countCorrect"];
				if($sum==0){
					$sum=1;					
				}
				$percentCorrect[$y]=$resultcorrect["countCorrect"]*100/$sum;
				$percentNotCorrect[$y]=$resultNotcorrect["countCorrect"]*100/$sum;
				$y++;
				//echo $y;
		}
		break;
			}
	$i++;
}}
?>
<div id="stat" style="display:none;min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<br/>
<div id="sum" style="display:none;min-width:90%;margin-left:10%; max-width:100%; height: 400px;">
<div id="gamesclick" style="display:none;width:71%; height: 400px; margin:2%;float:left"></div>
<br/><br/>
<div id="lv1" style="display:none;width:40%; height: 400px; margin: 0 auto;float:left"></div>
<div id="lv2" style="display:none;width:40%;height: 400px; margin: 0 auto;float:left"></div>
<div id="lv3" style="display:none;width:40%;height: 400px; margin: 0 auto;float:left"></div>
<div id="lv4" style="display:none;width:40%; height: 400px; margin: 0 auto;float:left"></div>
<div id="lv5" style="display:none;width:40%; height: 400px; margin: 0 auto;float:left"></div>
<div id="lv6" style="display:none;width:40%; height: 400px; margin: 0 auto;float:left"></div>
</div>
<script type="text/javascript">
$(function () {
	<?php if($typechart<4&&$nullY==0){?>
	$('#stat').show();
    $('#stat').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Report Game <?php echo $title?>'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
<?php foreach ($atPer as $cate) echo $cate.",";?>
                         ],
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
            //color:"green",
            name: 'ถูก',
            data: [<?php foreach ($valCorrect as $correct) echo $correct.",";?>]
        }, {
        //	color:"red",
            name: 'ผิด',
            data: [<?php foreach ($valNotCorrect as $notcorrect) echo $notcorrect.",";?>]
        },
		<?php 
		if($_GET["typechart"]==3){
			
?>
 {
    //	color:"red",
        name: 'คะแนนการคลิก',
        data: [<?php foreach ($valClick as $click) echo $click.",";?>]
    }
<?php 
		}
		?>
        ]
    });<?php }
    else if($typechart==4){
if($_GET["typechart"]==3){?>
$('#gamesclick').show();

$('#gamesclick').highcharts({
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Report การทดสอลการคลิก'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
<?php for($x=0;$x<6;$x++){
	echo '"Level '.($x+1).'",';
	
}?>
                     ],
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
        //color:"green",
        name: 'อัตราคลิกเฉลี่ย',
        data: [<?php foreach ($valClick as $correct) echo $correct.",";?>]
    }
    ]
});
<?php 
}
    	for($z=0;$z<6;$z++){
?>

	$('#sum').show();
	$('#lv<?php echo ($z+1);?>').show();
    $('#lv<?php echo ($z+1);?>').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
        	 text: 'Report Game <?php echo $title." Level ".($z+1)?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'คิดเป็นเปอร์เซ็น',
            data: [
                ['ถูก',<?php echo $percentCorrect[$z] ?>],
                ['ผิด', <?php echo $percentNotCorrect[$z] ?>],
             
            ]
        }]
    });
		
<?php 
    }}
	?>
});
		</script>