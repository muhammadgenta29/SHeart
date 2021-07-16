<script>
var refreshId = setInterval(function()
{
    $('#responsecontainer').load('grafik.php?kode=$fetch[kode];');
}, 1000);
</script>
    
<!-- Begin page content -->
<div class="container">
  <div id="responsecontainer">
	</div>	
</div>