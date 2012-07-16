$(document).ready(function() {
	$('#searchinputbox').focus(function() {
		$('#searchinputbox').val('');
	});
	
	$("#searchinputbox").autocomplete("xhr/get_station_list.php", {
			width: 260,
			matchContains: true,
			//mustMatch: true,
			//minChars: 0,
			//multiple: true,
			//highlight: false,
			//multipleSeparator: ",",
			selectFirst: false
	});
	
	$('a.test').click(function(){
			$.scrollTo($("#part1"), 700);
	});
	
	
});