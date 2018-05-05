
$(document).ready(function(){  
    $.getJSON(base+"Dashboards/getTicketPorTiemposFecha", function(data) { //obten 


var chart = AmCharts.makeChart("chartdivdate", {
    "type": "serial",
    "theme": "light",
    "marginRight": 80,
    "marginTop": 17,
    "autoMarginOffset": 20,
    "dataProvider":  data,
    "valueAxes": [{
        "logarithmic": true,
        "dashLength": 0,
        "guides": [{
            "dashLength": 6,
            "inside": true,
            "label": "average",
            "lineAlpha": 1,
            "value": 90.4
        }],
        "position": "left"
    }],
    "graphs": [{
        "bullet": "round",
        "id": "g1",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 7,
        "lineThickness": 2,
        "title": "Price",
        "type": "smoothedLine",
        "useLineColorForBulletBorder": true,
        "valueField": "price"
    }],
    "chartScrollbar": {},
    "chartCursor": {
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "valueLineAlpha": 0.9,
        "fullWidth": true,
        "cursorAlpha": 0.09
    },
    "dataDateFormat": "YYYY-MM",
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true
    },
    "export": {
        "enabled": true
    }
});

chart.addListener("dataUpdated", zoomChart);

function zoomChart() {
   // chart.zoomToDates(new Date(2012, 2, 2), new Date(2012, 2, 10));
}





    });
});