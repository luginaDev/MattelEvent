<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>js/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>js/fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='<?php echo base_url();?>js/fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript'>

  $(document).ready(function() {
  
    $('#calendar').fullCalendar({
     header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      events: "<?php echo base_url();?>backend/json_agendas",
       eventDrop: function(event, delta) {
        alert(event.title + ' was moved ' + delta + ' days\n' +
          '(function to updated databases)'+event.start+'waktu');
      },
      loading: function(bool) {
        if (bool) $('#loading').show();
        else $('#loading').hide();
      },
      eventClick : function(){
        alert(1);
        return false;
      }
      
    });
    
  });


</script>
<style type='text/css'>

  body {
    margin-top: 40px;
    text-align: center;
    font-size: 14px;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    }

  #calendar {
    width: 80%;
    margin: 0 auto;
    }

</style>
<div id='loading' style='display:none'>loading...</div>
<div id='calendar'></div>