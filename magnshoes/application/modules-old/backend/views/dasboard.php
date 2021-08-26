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
</script>
<div class="page-header well">
  <h1>Dashboard Management System </h1>
</div>
<div class="well span6" >
  <h2> Grafik Stok <?=date("Y")?> </h2>
   <p id="container_graph_stock"></p>
</div>
<div class="well span6" >
  <h2> Grafik Member Per Tahun </h2>
  <p id="container_graph2"></p>
</div>
<div class="well span6" >
  <h2> Grafik Pertumbuhan Penjualan Per Tahun </h2>
  <p id="container_graph3"></p>
</div>
<div class="well span6" >
  <h2> Grafik Pertumbuhan Retur Barang  </h2>
  <p id="container_graph4"></p>
</div> 