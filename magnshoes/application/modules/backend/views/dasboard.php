<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
    
        var colors = Highcharts.getOptions().colors,
            categories = [<?=$nama_stock?>],
            name = 'Produk Name',
            data = [<?=$category_stock?>];
    
        function setChart(name, categories, data, color) {
            chart.xAxis[0].setCategories(categories);
            chart.series[0].remove();
            chart.addSeries({
                name: name,
                data: data,
                color: color || 'white'
            });
        }
    
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container_graph_stock',
                type: 'column'
            },
            title: {
                text: 'Total Stok Barang <?=date("Y")?>'
            },
            subtitle: {
                text: 'Click untuk melihat Detail Barang. Click lagi kembali keproduk stok'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Total Stok '
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +'pcs';
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                        s = this.x +':<b>'+ this.y +'pcs </b><br/>';
                    if (point.drilldown) {
                        s += 'Click to view '+ point.category +'';
                    } else {
                        s += 'Click utk kembali ke produk';
                    }
                    return s;
                }
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        });
    });
    
});

$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container_graph2',
                type: 'area'
            },
            title: {
                text: "Pertumbuhan Penjualan Per tahun <?=date("Y")?>"
            },
            subtitle: {
                text: 'Source: Quixotik.org & Evolab.web.id'
            },
            xAxis: {
                categories: [<?=$month_sell?>],
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                }
            },
            yAxis: {
                title: {
                    text: 'cus'
                },
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ Highcharts.numberFormat(this.y, 0, ',') +' rupiah';
                }
            },
            plotOptions: {
               areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [<?=$data_monthly?>]
        });
    });
    
});

</script>

<h2>Administrator Panel</h2>

<div class="well span12" >
   <p id="container_graph_stock" style="height:300px"></p>
</div>
<div class="well span12" >
  <p id="container_graph2" style="height:300px"></p>
</div>

<div class="clear"></div>