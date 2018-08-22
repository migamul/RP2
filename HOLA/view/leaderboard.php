<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
	<script src="https://www.amcharts.com/lib/3/serial.js"></script>
	<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
	<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta charset="utf8">
<style>
* {
    box-sizing: border-box;
}

.tooltip {
    position: relative;
	text-align: center;
    text-decoration: underline;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
 
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
}

th {
	background-color: #FFF;
	color : #8145ca;
	font-size: 24px;
}
td a {
	text-decoration: none;
	color: black;
}


tr:nth-child(odd) {background: #d5c2ec;}
tr:nth-child(even) {background: #FFF;}

.header {
    padding: 5px;
    font-size: 20px;
    text-align: center;
    background: #956ec4;
    color: white;
}

td {
	text-align: right;
	padding: 5px 10px;
	font-weight: bold;
}

.goback
{
    background-color: #956ec4;
    border: solid black 1px;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 50px;
    margin: 2px 2px;
    cursor: pointer;
    position: absolute;
    left: 0px;
		top:15px;
}

#chartdiv {
	width: 100%;
	height: 300px;
}

.amcharts-export-menu-top-right {
  top: 10px;
  right: 0;
}

.outer-div
{
     padding: 30px;
	 margin-bottom: 120px;
}

#leaderboad
{
	padding: 30px;
     margin: auto;
     width: 300px; 
}

table{
	width: 100%;
	border: 5px outset #956ec4;
	padding: 20px;
	border-radius: 30px 30px 30px 0px;
	background-color: white;
}

#chartOut {
	margin-top: 30px;
	padding-top: 30px;
	margin: auto;
	width: 60%;
}
</style>
</head>
<body>

<div class="outer">
	<div class="header">
	  <p><div class="back">
		<a class="goback" href="<?php echo __SITE_URL; ?>/index.php?rt=users">Go back</a>
		</div>Rankings</p>
	</div>
	<div id="leaderboad">
		<table class="rlstable">
			<thead>
					<th>rank</th>
					<th>username</th>
					<th>score</th>
			</thead>
			<tbody>
				<?php 
					$br = 1;
					foreach( $allUsers as $user )
					echo '<tr><td>'.$br++.'.</td><td class="tooltip"><a href="'.__SITE_URL.'/index.php?rt=kviz/profile/id='.$user->id_user.'"> '.$user->username."</a><span class='tooltiptext'>Go to profile</span></td><td>".$user->score.'</td></tr>';
				?>
			</tbody>
		</table>
	</div>
</div>
		
	<div id="chartOut">
	<div id="chartdiv"></div>  
	</div>


<script>

$.ajax(
{
	url: "view/scores.php",
	dataType: "json",
	data:
	{
	},
	success: function( data )
	{
		let alist = [];
		if( typeof( data.error ) === "undefined" )
		{
			for(let i = 0; i < data.scores.length; ++i) {
				alist[i] = data.scores[i];
			}
		}
		console.log(alist);
		
		initialize(alist);
		
	},
	error: function( xhr, status )
	{
	}
} );

function initialize(alist) {
	AmCharts.addInitHandler(function(chart) { 
	  
	  function handleCustomMarkerToggle(legendEvent) {
		  var dataProvider = legendEvent.chart.dataProvider;
		  var itemIndex; 
		  
		  legendEvent.chart.toggleLegend = true; 

		  if (undefined !== legendEvent.dataItem.hidden && legendEvent.dataItem.hidden) {
			legendEvent.dataItem.hidden = false;
			dataProvider.push(legendEvent.dataItem.storedObj);
			legendEvent.dataItem.storedObj = undefined;
			//re-sort the array by dataIdx so it comes back in the right order.
			dataProvider.sort(function(lhs, rhs) {
			  return lhs.dataIdx - rhs.dataIdx;
			});
		  } else {
			// toggle the marker off
			legendEvent.dataItem.hidden = true;
			//get the index of the data item from the data provider, using the 
			//dataIdx property.
			for (var i = 0; i < dataProvider.length; ++i) { 
			  if (dataProvider[i].dataIdx === legendEvent.dataItem.dataIdx) {
				itemIndex = i;
				break;
			  }
			}
			//store the object into the dataItem
			legendEvent.dataItem.storedObj = dataProvider[itemIndex];
			//remove it
			dataProvider.splice(itemIndex, 1);
		  }
		  legendEvent.chart.validateData(); //redraw the chart
	  }

	  //check if legend is enabled and custom generateFromData property
	  //is set before running
	  if (!chart.legend || !chart.legend.enabled || !chart.legend.generateFromData) {
		return;
	  }
	  
	  var categoryField = chart.categoryField;
	  var colorField = chart.graphs[0].lineColorField || chart.graphs[0].fillColorsField || chart.graphs[0].colorField;
	  var legendData =  chart.dataProvider.map(function(data, idx) {
		var markerData = {
		  "title": data[categoryField] + ": " + data[chart.graphs[0].valueField], 
		  "color": data[colorField],
		  "dataIdx": idx //store a copy of the index of where this appears in the dataProvider array for ease of removal/re-insertion
		};
		if (!markerData.color) {
		  markerData.color = chart.graphs[0].lineColor;
		}
		data.dataIdx = idx; //also store it in the dataProvider object itself
		return markerData;
	  });
	  
	  chart.legend.data = legendData;
	  
	  //make the markers toggleable
	  chart.legend.switchable = true;
	  chart.legend.addListener("clickMarker", handleCustomMarkerToggle);
	  
	}, ["serial"]);

	  var list = alist;

	  console.log(list);
	var chart = AmCharts.makeChart("chartdiv", {
	  "type": "serial",
	  "theme": "light",
	  "marginRight": 70,
	  "legend": { 
		"generateFromData": true //custom property for the plugin
	  },
	  "dataProvider": list,
	  "valueAxes": [{
		"axisAlpha": 0,
		"position": "left",
		"title": "Scores"
	  }],
	  "startDuration": 1,
	  "graphs": [{
		"balloonText": "<b>[[category]]: [[value]]</b>",
		"fillColorsField": "color",
		"fillAlphas": 0.9,
		"lineAlpha": 0.2,
		"type": "column",
		"valueField": "scores"
	  }],
	  "chartCursor": {
		"categoryBalloonEnabled": false,
		"cursorAlpha": 0,
		"zoomable": false
	  },
	  "categoryField": "username",
	  "categoryAxis": {
		"gridPosition": "start",
		"labelRotation": 45
	  },
	  "export": {
		"enabled": true
	  }

	});
}
</script>

	
<?php require_once __SITE_PATH . '/view/__footer.php'; ?>