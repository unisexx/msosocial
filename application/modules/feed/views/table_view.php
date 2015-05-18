<script type="text/javascript" src="media/js/jquery-1.7.2.min.js"></script>

<style>

table tr.even td{
    background: #cdded6;
}

</style>

<script type="text/javascript">
	$(document).ready(function(){
	
		$("table tr:nth-child(even)").addClass("even");
	
	});
</script>
<div><?=$title?></div>
<table class="table table-bordered table-striped table-hover">
	<thead>
	<th>
			<td>module</td>
			<td>slug</td>
			<td>title</td>
			<td>category_id</td>
            <td>detail</td>
			<td>image</td>
			<td>user_id</td>
			<td>counter</td>
            <td>status</td>
			<td>created</td>
			<td>updated</td>
			<td>start_date</td>
            <td>end_date</td>
	</th>
	</thead>
	
	<tbody>
		{products}
	</tbody>
	
</table>
