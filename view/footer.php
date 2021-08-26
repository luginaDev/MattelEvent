    <!-- base js -->
    <script src="../js/app.js"></script>
    <script src="../assets/plugins/feather-icons/feather.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- end base js -->

    <script src="../assets/js/template.js"></script>
    <!-- end common js -->
    <script src="../assets/plugins/datatables-net/jquery.dataTables.js"></script>
  <script src="../assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../assets/plugins/chartjs/Chart.min.js"></script>
  <script src="../js/jquery.table2excel.js"></script>





<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $('#master_employee').DataTable({
                scrollY: 600,
                scrollX: true,
                scrollCollapse: false,
                paging: false,
                fixedColumns: true,
           

                  dom: 'Bfrtip',
                  order: [[ 2, "desc" ]],
                  buttons: [
                      'copy', 'excel', 'pdf'
                  ]
          
      });
      
       $('#master_employee_unconfirm').DataTable({
                scrollY: 600,
                scrollX: true,
                scrollCollapse: false,
                paging: false,
                fixedColumns: true,
                ordering:false,
                 dom: 'Bfrtip',
                  buttons: [
                      'copy', 'excel',  'print'
                  ]
      });
      $('#table-event').DataTable({
       
              
       scrollY: 600,
       scrollX: true,
       scrollCollapse: false,
       paging: false,
       fixedColumns: true,
 
});


          $("#export_to_excel").click(function () {
            //var getFileNames = document.getElementById('Department_code');
            
            $("#master_employee").table2excel({
                exclude: ".trs",
                name: "Worksheet Name",
                filename:"CONFIRMED-EVENT",
                fileext: ".xlx",
                preserveColors: true,
                exclude_img: true
            });
        });

          function deleteEvent(){
              Swal.fire({
              title: 'Are you sure?',
         
              showCancelButton: true,
              confirmButtonText: `Save`,
             
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                $('#form-delete-event').submit();
              } 
            })
          }

          
  </script>

</body>

</html>