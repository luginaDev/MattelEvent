
    $(document).ready(function() {
      $(".modal").hide();
        // var chart;
        // chart = new Highcharts.Chart({
        //     chart: {
        //         renderTo: 'container_graph',
        //         type: 'area'
        //     },
        //     title: {
        //         text: 'US and USSR nuclear stockpiles'
        //     },
        //     subtitle: {
        //         text: 'Source: <a href="http://thebulletin.metapress.com/content/c4120650912x74k7/fulltext.pdf">'+
        //             'thebulletin.metapress.com</a>'
        //     },
        //     xAxis: {
        //         labels: {
        //             formatter: function() {
        //                 return this.value; // clean, unformatted number for year
        //             }
        //         }
        //     },
        //     yAxis: {
        //         title: {
        //             text: 'Nuclear weapon states'
        //         },
        //         labels: {
        //             formatter: function() {
        //                 return this.value / 1000 +'k';
        //             }
        //         }
        //     },
        //     tooltip: {
        //         formatter: function() {
        //             return this.series.name +' produced <b>'+
        //                 Highcharts.numberFormat(this.y, 0) +'</b><br/>warheads in '+ this.x;
        //         }
        //     },
        //     plotOptions: {
        //         area: {
        //             pointStart: 1940,
        //             marker: {
        //                 enabled: false,
        //                 symbol: 'circle',
        //                 radius: 2,
        //                 states: {
        //                     hover: {
        //                         enabled: true
        //                     }
        //                 }
        //             }
        //         }
        //     },
        //     series: [{
        //         name: 'USA',
        //         data: [null, null, null, null, null, 6 , 11, 32, 110, 235, 369, 640,
        //             1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,
        //             27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342, 26662,
        //             26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
        //             24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586,
        //             22380, 21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950,
        //             10871, 10824, 10577, 10527, 10475, 10421, 10358, 10295, 10104 ]
        //     }, {
        //         name: 'USSR/Russia',
        //         data: [null, null, null, null, null, null, null , null , null ,null,
        //         5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
        //         4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
        //         15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
        //         33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
        //         35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
        //         21000, 20000, 19000, 18000, 18000, 17000, 16000]
        //     }]
        // });
// $(".alert").alert();
    $('#example').dataTable( {
        "sDom": "<'row'<'span4'l><'offset5'f>r>t<'row'<'span4'i><'offset5'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        }
    } );
   
   $('#myModal').modal('hide');
   $(".close-modal").click(function(){
       $('#myModal').modal('hide');
   });
   $(".tanggal").datepicker();
   $("#form-validate").validate();
   $(".notifikasi_penjualan").click(function(){

      var id = $(this).attr("id");
      var url = $("#base_url").val();
      $.post(url+"sells/notifikasi_data", { id: id} ,function(data){
        console.log(data);
        $(".notifikasi_body").html(data);
        $('#myModalPenjualan').modal('show');
      });

    });

});    


/* Default class modification */
$.extend( $.fn.dataTableExt.oStdClasses, {
    "sWrapper": "dataTables_wrapper form-inline"
} );

/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
    return {
        "iStart":         oSettings._iDisplayStart,
        "iEnd":           oSettings.fnDisplayEnd(),
        "iLength":        oSettings._iDisplayLength,
        "iTotal":         oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
        "iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
    };
}

/* Bootstrap style pagination control */
$.extend( $.fn.dataTableExt.oPagination, {
    "bootstrap": {
        "fnInit": function( oSettings, nPaging, fnDraw ) {
            var oLang = oSettings.oLanguage.oPaginate;
            var fnClickHandler = function ( e ) {
                e.preventDefault();
                if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
                    fnDraw( oSettings );
                }
            };

            $(nPaging).addClass('pagination').append(
                '<ul>'+
                    '<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
                    '<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
                '</ul>'
            );
            var els = $('a', nPaging);
            $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
            $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
        },

        "fnUpdate": function ( oSettings, fnDraw ) {
            var iListLength = 5;
            var oPaging = oSettings.oInstance.fnPagingInfo();
            var an = oSettings.aanFeatures.p;
            var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

            if ( oPaging.iTotalPages < iListLength) {
                iStart = 1;
                iEnd = oPaging.iTotalPages;
            }
            else if ( oPaging.iPage <= iHalf ) {
                iStart = 1;
                iEnd = iListLength;
            } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
                iStart = oPaging.iTotalPages - iListLength + 1;
                iEnd = oPaging.iTotalPages;
            } else {
                iStart = oPaging.iPage - iHalf + 1;
                iEnd = iStart + iListLength - 1;
            }

            for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
                // Remove the middle elements
                $('li:gt(0)', an[i]).filter(':not(:last)').remove();

                // Add the new list items and their event handlers
                for ( j=iStart ; j<=iEnd ; j++ ) {
                    sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
                    $('<li '+sClass+'><a href="#">'+j+'</a></li>')
                        .insertBefore( $('li:last', an[i])[0] )
                        .bind('click', function (e) {
                            e.preventDefault();
                            oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                            fnDraw( oSettings );
                        } );
                }

                // Add / remove disabled classes from the static elements
                if ( oPaging.iPage === 0 ) {
                    $('li:first', an[i]).addClass('disabled');
                } else {
                    $('li:first', an[i]).removeClass('disabled');
                }

                if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                    $('li:last', an[i]).addClass('disabled');
                } else {
                    $('li:last', an[i]).removeClass('disabled');
                }
            }
        }
    }
} );

/* Table initialisation */

