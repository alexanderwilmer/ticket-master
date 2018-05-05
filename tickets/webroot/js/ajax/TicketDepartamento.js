$.getJSON(base+"Dashboards/getTicketPorDepartamento", function(data) { //obtenemos los datos del calendario 
var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "startDuration": 2,
     //"colors":["#FF6600",  "#00CC00", "#0000CC", "#DDDDDD", "#999999", "#333333", "#990000"],
    "dataProvider": data,
    "balloon": {
  "disableMouseEvents": false,
  "fixedPosition": true
},
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.85,
        "lineAlpha": 0.1,
        "type": "column",
        "topRadius":1,
        "valueField": "visits"
    }],
    "depth3D": 40,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha":0,
        "gridAlpha":0

    },

    "export": {
    	"enabled": true
     }

}, 0);

});