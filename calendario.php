<?php 

include('db_connect.php')
?>

<style>
#selectAll{
	top:0
}
#calendar {
	width: 700px;
	margin: 0 auto;
}
</style>
<div class="card card-outline card-primary">
	<div class="card-body">
        <div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<div id="calendar"></div>
				</div>

			</div>
		</div>
	</div>
</div>
<?php

$sched_qry = $conn->query("SELECT * FROM task_list WHERE empresa='{$_SESSION['login_empresa']}'");
$sched_data = array();
while($row=$sched_qry->fetch_assoc()):
	$sched_data[]=$row;
endwhile;
$sched = json_encode($sched_data);
?>
<script>
	var scheds = $.parseJSON('<?php echo $sched ?>');
	$(function(){
		$('#add_sched').submit(function(e){
			e.preventDefault()
			start_loader()
			$('#add_sched .err-msg').remove()

			$.ajax({
				url:_base_url_+'classes/Master.php?f=save_schedule',
				method:"POST",
				data: $(this).serialize(),
				dataType:"json",
				error:err=>{
					console.log(err)
					end_loader()
					alert_toast("An error occured","error");
				},
				success:function(resp){
					if(resp.status == 'success'){
						location.reload()
					}else if(resp.status == 'failed' && !!resp.err_msg){
						var el = $('<div class="err-msg alert alert-danger mb-1">')
							el.text(resp.err_msg)
						$('#add_sched').prepend(el)
							el.show('slow')
					}else{
						console.log(resp)
						alert_toast("An error occured","error");
					}
					end_loader();
				}
			})
		})
		//$('.select2').select2({placeholder:"Porfavor selecciona una cancha"})
		var Calendar = FullCalendar.Calendar;
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()
		
		var calendarEl = document.getElementById('calendar');
		var calendar = new Calendar(calendarEl, {
    defaultView: 'dayGridMonth',
    showNonCurrentDates: false, 
                        headerToolbar: {
                            left  : 'prev,next today',
                            center: 'title',
                            right : 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        themeSystem: 'bootstrap',
                        //Random default events
                        events:function(event,successCallback){
                            var days = moment(event.end).diff(moment(event.start),'days')
                            var events = []
							Object.keys(scheds).map(k=>{
							if (moment(scheds[k].due_date).isBefore(moment(), 'day')) {
        						// La fecha due_date es anterior a la fecha actual
        						color = 'rgb(0, 0, 255)';
    						}
								events.push({
									title          : scheds[k].task,
									start          : moment(scheds[k].date_created).format("YYYY-MM-DD"),
									end            : moment(scheds[k].date_created).format("YYYY-MM-DD"),
									backgroundColor: color, 
									borderColor    : 'var(--primary)',
									'data-id'      : scheds[k].id
								})
								events.push({
									title          : scheds[k].task + ' 😢',
									start          : moment(scheds[k].due_date).format("YYYY-MM-DD"),
									end            : moment(scheds[k].due_date).format("YYYY-MM-DD"),
									backgroundColor: 'rgb(255, 100, 100)', 
									borderColor    : 'var(--primary)',
									'data-id'      : scheds[k].id
								})
							})
							console.log(events)
                            successCallback(events)
                        },
                        eventClick:function(info){
							sched_id = info.event.extendedProps['data-id']
							console.log(sched_id)
                            uni_modal("Detalle de Tareas","view_taskCalendario.php?id="+sched_id)
                        },
                        editable  : true,
                        selectable: true,
                        
				});

	calendar.render();
	})
    $('#calendar').css('width', '1500px'); // Ajusta el ancho a 800px
        $('#calendar').css('height', '100px'); // Ajusta la altura a 600px
        
	//setInterval("location.reload()",90000);
</script>