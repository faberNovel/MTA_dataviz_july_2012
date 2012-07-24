

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
			$.scrollTo(325, 700);
	});
	
	show_most_vsited_stattions('MNH');
	get_data('annual_ridership');
});

var start_ = 0;
//var next_step;


function display_graph(filter_week,filter_bor,start_) {
	var next_step;
	$('#graph_result4').html('');
	var paper_graph4 = Raphael("graph_result4", 660, 200);
	
	var line = paper_graph4.path("M10 100L560 100");
	line.attr({fill: '', stroke: '#1A263D', 'stroke-width': 3});
	x = 70;
	y = 100;
	var nb_item = 0;
	$.getJSON("xhr/get_most_visited_stations.php?field=" + filter_week + "&borough=" + filter_bor + "&start=" + start_,
	function(data){
		var nb_item = 0;
		$.each(data, function(key, value){
				var circle = paper_graph4.circle(x,y,value.radius);;
				circle.attr("fill", "#76CDD3");
				circle.data("station",value.station);
				circle.data("nb",value.nb);
				circle.click(function () {
					alert(this.data("nb"));
				});
				x = x + 65;
			//	('#nb_item').text(data.length);
		});
	
	});

		if (0) {
			var arrow_right_off = ["graph_result4",31,22,{"stroke":"none","fill":"#24293D","type":"path","path":"M0,7c0-3.867,3.135-7,7-7h17c3.867,0,7,3.133,7,7v8c0,3.865-3.133,7-7,7H7c-3.865,0-7-3.135-7-7V7z"},{"stroke":"none","fill":"#343C56","type":"path","path":"M12,4.588 22.326,11.219 12,17.85 \tz"}];
			ri = paper_graph4.add(arrow_right_off);
			ri.transform("t550,90");
			
		}else {
			var arrow_right_on =["graph_result4",100,22,{"path":"M0,7c0-3.867,3.135-7,7-7h17c3.867,0,7,3.133,7,7v8c0,3.865-3.133,7-7,7H7c-3.865,0-7-3.135-7-7V7z","fill":"#24293D","stroke":"none","type":"path"},{"path":"M12,4.588 22.326,11.219 12,17.85 \tz","fill":"#85CCD5","stroke":"none","type":"path"}];
			ri = paper_graph4.add(arrow_right_on);
			ri.transform("t550,90");
			ri.click(function () {
				pager_most_visited_station('next');
			});
			
		}

		if (start_ == 0) {
			var arrow_left_off = ["graph_result4",31,22,{"stroke":"none","fill":"#24293D","type":"path","path":"M31,15c0,3.867-3.135,7-7,7H7c-3.867,0-7-3.133-7-7V7c0-3.865,3.133-7,7-7h17c3.865,0,7,3.135,7,7V15z"},{"stroke":"none","fill":"#343C56","type":"path","path":"M19,17.412 8.674,10.781 19,4.15 \tz"}];
			le = paper_graph4.add(arrow_left_off);
			le.transform("t0,90");
		}else {
			var arrow_left_on= ["graph_result4",31,22,{"path":"M31,15c0,3.867-3.135,7-7,7H7c-3.867,0-7-3.133-7-7V7c0-3.865,3.133-7,7-7h17c3.865,0,7,3.135,7,7V15z","fill":"#24293D","stroke":"none","type":"path"},{"path":"M19,17.412 8.674,10.781 19,4.15 \tz","fill":"#85CCD5","stroke":"none","type":"path"}];
			le = paper_graph4.add(arrow_left_on);
			le.transform("t0,90");
			le.click(function () {
				pager_most_visited_station('prev');
			});
		}

}

function pager_most_visited_station(act) {
	if (act == 'next') {
		start_ = start_ + 8;
	}
	if (act == 'prev') {
		start_ = start_ - 8;
	}
//	console.log('start  =>' + start_);
	
	filter_bor = '';
	filter_week = '';
	if ($('#filter_BK').hasClass('active')) filter_bor = 'BK';
	if ($('#filter_QNS').hasClass('active')) filter_bor = 'QNS';
	if ($('#filter_BX').hasClass('active')) filter_bor = 'BX';
	if ($('#filter_MNH').hasClass('active')) filter_bor = 'MNH';
	if ($('#filter_weekday_ridership').hasClass('active')) filter_week = 'weekday_ridership';
	if ($('#filter_weekend_ridership').hasClass('active')) filter_week = 'weekend_ridership';
	//console.log(filter_week + ' ' + filter_bor);
	display_graph(filter_week,filter_bor,start_);
}



function show_most_vsited_stattions(key) {

	var filter_week = '';
	var filter_bor = '';
	var start_ = 0;

	if (key == 'weekday_ridership' || key == 'weekend_ridership') {
		$('#filter_weekday_ridership').removeClass('active');
		$('#filter_weekend_ridership').removeClass('active');
		filter_week = key;
		if ($('#filter_BK').hasClass('active')) filter_bor = 'BK';
		if ($('#filter_QNS').hasClass('active')) filter_bor = 'QNS';
		if ($('#filter_BX').hasClass('active')) filter_bor = 'BX';
		if ($('#filter_MNH').hasClass('active')) filter_bor = 'MNH';
	}
	if (key == 'BK' || key == 'BX' || key == 'MNH' || key == 'QNS') {
		$('#filter_BX').removeClass('active');
		$('#filter_MNH').removeClass('active');
		$('#filter_BK').removeClass('active');
		$('#filter_QNS').removeClass('active');
		if ($('#filter_weekday_ridership').hasClass('active')) filter_week = 'weekday_ridership';
		if ($('#filter_weekend_ridership').hasClass('active')) filter_week = 'weekend_ridership';
		filter_bor = key;
	}
	//console.log(filter_week + ' ' + filter_bor);
	$('#filter_' + key).addClass('active');
	display_graph(filter_week,filter_bor,start_);
}

var x_svg = 128;
var nb_start_x = 5;
var nb_start_y = 5;
var interval_circle = 13;
var circle_radius = 5;
var nb1;
var all_nb;

function display_graph1(nb1) {
	var paper1 = Raphael("result_part1",x_svg, 300);
	startx = nb_start_x;
	starty = nb_start_y;

	for (i=1; i<nb1; i++)
	{
		x = startx;
		y = i + 10;
		if (x > 1) {
			o = parseInt(x) + interval_circle;
			startx = o;
			if (o > x_svg - nb_start_x) {
				starty = starty + interval_circle;
				startx = o = nb_start_x;
			}
		}
		var circle1  = paper1.circle(o,starty, circle_radius);
		circle1.attr("fill", "#212D42");
    }
 }

 function display_graph2(nb) {
	var paper2 = Raphael("result_part2",x_svg, 300);
	startx = nb_start_x;
	starty = nb_start_y;
	for (i=1; i<nb; i++)
	{
		x = startx;
		y = i + 10;
		if (x > 1) {
			o = parseInt(x) + interval_circle;
			startx = o;
			if (o > x_svg - nb_start_x) {
				starty = starty + interval_circle;
				startx = o =  nb_start_x;
			}
		}
		var circle1  = paper2.circle(o,starty, circle_radius);
		circle1.attr("fill", "#212D42");
	}
}

 function display_graph3(nb) {
	var paper3 = Raphael("result_part3",x_svg, 300);

	startx = nb_start_x;
	starty = nb_start_y;
	for (i=1; i<nb; i++)
	{
		x = startx;
		y = i + 10;
		if (x > 1) {
			o = parseInt(x) + interval_circle;
			startx = o;
			if (o > x_svg - nb_start_x) {
				starty = starty + interval_circle;
				startx = o =  nb_start_x;
			}
		}
		var circle1  = paper3.circle(o,starty, circle_radius);
		circle1.attr("fill", "#212D42");
	}
}

function display_graph4(nb) {
	var paper4 = Raphael("result_part4",x_svg, 300);
	startx = nb_start_x;
	starty = nb_start_y;
	for (i=1; i<nb; i++)
	{
		x = startx;
		y = i + 10;
		if (x > 1) {
			o = parseInt(x) + interval_circle;
			startx = o;
			if (o > x_svg - nb_start_x) {
				starty = starty + interval_circle;
				startx = o =  nb_start_x;
			}
		}
		var circle1  = paper4.circle(o,starty, circle_radius);
		circle1.attr("fill", "#212D42");
	}
}

function get_data(s) {
	$('#result_part1').html('');
	$('#result_part2').html('');
	$('#result_part3').html('');
	$('#result_part4').html('');
	$('#annual_ridership').removeClass('active');
	$('#weekdays_ridership').removeClass('active');
	$('#weekend_ridership').removeClass('active');
	$('#number_of_stations').removeClass('active');
	$('#' + s).addClass('active');
	$.getJSON("xhr/get_ridership.php?s=" + s,
	function(data){
		display_graph1(data[0].nb1);
		display_graph2(data[1].nb2);
		display_graph3(data[2].nb3);
		display_graph4(data[3].nb4);
		
	});
}

window.onload = function () {
		var paper = Raphael("map", 660, 800);
		paper.canvas.style.zIndex = "50";
		var mapdata  = [{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M449.466,666.744 462.101,665.596 473.591,674.784 488.525,670.189 498.869,671.34 \n\t\t\t\t509.207,692.017 513.794,709.249 497.715,703.505 481.636,712.696 458.657,708.096 446.022,717.288 393.185,729.923 \n\t\t\t\t355.273,743.71 295.538,767.831 243.843,791.952 228.915,789.657 172.623,819.525 174.924,797.701 195.6,781.617 \n\t\t\t\t210.533,780.468 217.426,772.428 227.768,779.319 244.994,771.279 249.588,764.386 267.97,767.831 305.875,744.862 \n\t\t\t\t320.81,735.667 344.934,736.817 361.02,726.479 389.738,714.996 395.479,705.801 404.669,697.758 420.751,701.206 \n\t\t\t\t437.981,678.231 443.725,672.487 447.177,679.384 436.833,700.064 454.062,698.906 457.514,680.531 450.619,670.189 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M295.538,633.433 273.708,649.513 272.565,659.846 295.538,654.109 295.538,646.064 \n\t\t\t\t290.944,643.775 296.685,638.021 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M313.917,689.722 303.579,689.722 297.835,694.316 310.472,705.801 319.661,698.906 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M330.005,667.896 321.957,682.825 330.005,688.572 342.631,675.938 340.339,666.744 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M364.466,613.903 355.273,620.793 357.572,639.177 341.49,657.552 347.234,664.447 \n\t\t\t\t356.421,663.293 367.905,675.938 366.763,692.017 356.421,701.206 348.378,701.206 334.592,708.096 340.339,712.696 \n\t\t\t\t367.905,708.096 373.65,685.126 380.544,678.231 381.69,665.596 378.251,648.363 371.358,638.021 366.763,612.758 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M325.408,610.456 309.322,628.837 321.957,633.433 333.449,618.496 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M341.49,623.091 331.152,631.131 336.894,643.775 343.787,629.985 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M307.029,638.021 310.472,635.729 323.111,638.021 325.408,647.216 307.029,657.552 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M402.37,634.579 394.334,642.62 398.931,663.293 409.264,640.323 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M381.69,686.276 386.287,701.206 390.882,693.167 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M403.519,672.487 396.628,681.675 402.37,686.276 415.011,682.825 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M459.808,650.665 452.917,658.705 462.101,662.149 \t\t\tz"},{"stroke":"none","fill":"#1A263D","type":"path","path":"M46.263,482.947 26.74,504.773 33.627,510.513 47.419,500.176 58.901,485.249 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M169.18,315.233 135.868,362.331 139.309,364.628 170.327,322.126 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M451.767,122.247 457.514,155.558 457.514,137.181 463.257,132.584 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M471.298,11.966 479.003,0.525 423.003,0.525 220.871,0.525 301.282,33.794 318.513,17.712 \n\t\t\t\t336.894,25.755 340.339,45.282 365.614,57.919 370.211,54.472 418.453,70.555 432.24,52.173 443.699,35.939 447.177,37.241 \n\t\t\t\t443.725,45.282 437.981,53.322 439.131,56.77 447.177,52.173 463.257,37.241 465.555,28.05 459.808,22.304 452.585,20.341 \n\t\t\t\t455.213,15.415 \t\t\tz"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M452.917,61.361l-3.451,9.194c0,0,8.048,9.188,8.048,8.04c0-1.146,3.446-3.448,3.446-3.448l-1.152-6.89 c0,0,3.449-4.594,2.293-4.594C460.96,63.664,452.917,61.361,452.917,61.361z"},{"stroke":"none","fill":"#E2F3F3","type":"path","path":"M659.685,239.419 643.603,193.466 613.742,133.731 547.109,99.27 521.836,109.612 \n\t\t\t\t526.433,136.033 520.69,159.004 551.704,177.387 573.53,184.275 565.496,216.445 556.302,239.419 536.771,221.035 \n\t\t\t\t537.921,207.252 485.079,171.638 479.335,188.87 486.231,203.808 480.484,222.185 460.96,229.081 483.928,269.281 \n\t\t\t\t485.079,294.553 579.457,356.642 578.299,391.348 558.601,414.023 524.136,426.659 527.583,493.289 521.836,540.382 \n\t\t\t\t504.607,586.333 489.675,615.053 505.754,613.903 459.808,650.665 488.525,670.189 509.207,687.419 512.655,704.653 \n\t\t\t\t580.423,708.096 595.357,690.864 659.685,698.906 \t\t\tz"},{"stroke":"none","fill":"#1A263D","type":"path","path":"M191.003,275.032 193.298,262.39 191.735,260.04 180.689,286.367 \t\t\t\tz"},{"stroke":"none","fill":"#1A263D","type":"path","path":"M220.664,106.557l-22.008,30.122l-11.381,45.506l2.291,51.505l4.751,20.191l-2.582,6.158l1.563,2.351 l-2.295,12.642l-10.314,11.335l-0.672,1.613l12.139,7.724l21.826-28.722l-1.152-4.592l6.891-1.148l13.785-16.082l13.785-5.74 l16.084,9.188l8.04-2.297l10.338,6.891l8.044-10.337l26.421,3.446l9.19-4.599l-3.451-12.632l4.599,1.148l9.19-17.232 l2.299,16.084l4.587,12.632l9.196,2.298l1.146-11.487l22.979-8.039l41.353,21.827l3.447-6.892l-21.82-11.491l9.183-9.19 c0,0-14.929-20.675-16.083-20.675c-1.148,0-10.341,3.442-10.341,3.442l3.456-9.187l-9.194-21.826l4.593-6.891l4.602-9.191 l-6.895-3.448l-1.151-13.781l5.746-2.299l-4.595-19.524l-6.894,1.147l1.147-9.195l-9.192-12.637l8.045-26.416l3.443,32.16 l5.743-1.147l-2.293,10.342l12.631,11.484l4.597-3.448l2.301,16.083l6.89,13.788l4.595-6.898l-3.443-8.036l6.887-4.591 l10.342,14.929l-4.597,5.747l11.488,21.823l9.19-4.599l-5.744-9.186l4.594-6.896l-17.229-22.979l-3.447,1.16l-2.293-4.601 l3.441-3.448l-2.299-5.742l4.598-10.338l14.937-5.745v-6.892l-10.343,3.445l5.738-11.48l-8.034-6.894l-8.038,3.443l2.293-9.188 l-45.946-16.083l-6.892,3.447l-24.127-12.638l-3.445-19.526l-20.677-9.19l-14.936,17.229L220.871,0.475l-19.045,71.694 l23.962,10.05L220.664,106.557z"},{"stroke":"none","fill":"#1A263D","type":"path","path":"M74.987,457.676 107.15,451.93 119.785,408.283 115.191,396.789 117.483,378.412 166.88,309.486 \n\t\t\t\t\t164.583,295.704 181.814,271.735 189.472,253.475 184.957,234.109 182.632,181.712 182.709,181.388 194.383,134.671 \n\t\t\t\t\t216.34,104.632 220.473,85.007 200.043,76.44 162.287,147.519 155.396,178.533 55.455,360.034 50.859,423.215 38.222,461.119 \n\t\t\t\t\t48.563,473.755 \t\t\t\tz"},{"stroke":"none","fill":"#1A263D","type":"path","path":"M495.002,288.382 488.062,326.561 467.235,305.738 455.667,281.443 460.292,276.814 \n\t\t\t\t\t448.728,258.302 435.688,263.541 434.538,273.881 421.938,271.524 415.177,258.302 390.882,257.148 378.152,250.205 \n\t\t\t\t\t365.431,259.461 363.114,268.716 357.332,275.658 348.076,271.033 345.761,258.302 320.306,266.405 317.995,287.229 \n\t\t\t\t\t328.41,290.7 330.721,320.779 341.136,326.561 334.592,333.61 321.957,343.948 309.9,333.501 304.116,321.933 314.528,312.681 \n\t\t\t\t\t290.229,294.168 293.241,289.963 285.199,276.171 257.628,256.644 250.739,273.881 270.264,288.814 279.455,285.366 \n\t\t\t\t\t282.903,291.107 269.409,294.168 269.409,310.366 249.74,305.738 251.884,298 242.7,291.107 246.141,284.219 225.446,271.033 \n\t\t\t\t\t189.857,307.191 182.964,302.601 174.924,311.784 180.668,318.68 143.907,370.373 139.534,378.638 170.27,382.257 \n\t\t\t\t\t182.797,407.316 198.121,404.959 207.903,435.511 247.185,501.73 292.57,480.167 306.426,487.097 306.426,508.888 \n\t\t\t\t\t321.599,545.063 315.727,566.208 319.184,593.035 320.81,595.526 348.076,594.965 351.828,585.185 371.211,585.708 \n\t\t\t\t\t390.882,596.119 435.998,622.729 456.827,635.456 461.451,645.867 469.553,636.609 475.335,626.199 497.317,616.943 \n\t\t\t\t\t495.417,607.008 507.728,603.062 513.513,588.022 537.807,579.923 535.493,564.884 532.025,551.003 532.602,530.827 \n\t\t\t\t\t536.048,514.746 535.493,443.411 532.025,422.584 558.601,414.023 580.615,393.666 580.615,357.796 \t\t\t\tz"},{"stroke":"none","fill":"#1A263D","type":"path","path":"M316.711,545.373L301.8,509.818v-19.859l-9.283-4.639l-47.165,22.398l-41.697-70.297l-8.734-27.29 l-14.75,2.269l-12.927-25.84l-30.036-3.535l-3.644,6.875l2.304,22.974l-10.335,22.972l-3.45,17.234l-6.546,5.369l-24.296,4.626 l-5.909-0.454l-12.638,14.934l-6.901,21.385l-26.609,23.138l6.647,12.884l9.549,12.568l6.943-6.939l13.881,2.313l-4.625,12.726 l-16.199,1.156l-20.825,17.354l-7.814,19.089l-14.938,5.74L0.315,635.729l9.192,37.907l11.485,11.49l33.311,9.189l24.215,16.336 l-3.466,18.513l10.406,2.314l8.1,10.407l-26.609-2.31l-13.883,4.626v6.942l13.883,9.252l23.139,2.318l27.766-4.633l32.945-6.333 l38.783-2.916l-2.32-10.414l-9.247-2.315l1.505-2.735l12.375-0.729l1.157-3.475l30.085,8.097l-1.113-11.933l19.618-3.104 l8.099,12.723l-3.47,4.63l1.021,6.428c0,0,35.991-8.743,34.844-8.743c-1.15,0,0-12.726,0-12.726l-16.461-37.116H242.7 l12.827-12.631l6.943-1.152l-11.574-18.515l-2.314-10.413l10.414,1.158l7.822-12.434l15.316-16.49l10.409-2.312l-2.314-18.513 l10.415-2.317l11.568,1.164l-1.74-9.78l-6.894-16.082l9.79,15.009l-2.354-18.237L316.711,545.373z"},{"stroke":"none","fill":"#1A263D","type":"path","path":"M179.519,287.663 180.017,287.98 180.689,286.367 \t\t\t\tz"}];
		paper.add(mapdata);
		var circles = [
			{"id":1,"x":84,"y":398,"radius":7,"station": "14 St-Union Square","text" : "The cool place \nto hang out for \nany high-schooler","nb":"20986 RIDERS"},
			{"id":2,"x":100,"y":324,"radius":7,"station": "59 St Columbus Circle","text" : "","nb":"17596 RIDERS"},
			{"id":3,"x":99,"y":498,"radius":7,"station": "DeKalb Av","text" : "","nb":"14272 RIDERS"},
			{"id":4,"x":107,"y":513,"radius":7,"station": "Atlantic Av","text" : "A massive transit \n station in Brooklyn \nand the Atlantic Mall","nb":"14062 RIDERS"},
			{"id":5,"x":185,"y":377,"radius":7,"station": "33 St-Rawson St","text" : "Near LaGuardia \nCommunity College","nb":"13573 RIDERS"},
			{"id":6,"x":357,"y":347,"radius":7,"station": "Flushing-Main St","text" : "Suburbians catch \ntheir first 7th train \nat this station","nb":"13447 RIDERS"},
			{"id":7,"x":99,"y":310,"radius":7,"station": "66 St Lincoln Center","text" : "","nb":"13192 RIDERS"},
			{"id":8,"x":89,"y":435,"radius":7,"station": "Essex St-Delancey St","text" : "The other cool \nplace to hang out \nfor any high-schooler","nb":"13126 RIDERS"},
			{"id":9,"x":64,"y":387,"radius":7,"station": "8 Av-14 St","text" : "","nb":"12792 RIDERS"},
			{"id":10,"x":90,"y":490,"radius":7,"station": "Jay St MetroTech","text" : "Fulton Street Mall \nnearby with its \ndiscount stores","nb":"11719 RIDERS"}
		]
		arr = [];
		arr_visible = [];
		all_text = [];
		arr_text = [];
		all_riders = [];
		arr_riders = [];
		all_station = [];
		arr_station = [];
		
		$.each(circles, function(key, value){
			var infobulle =[value.x,value.y,{"stroke":"none","fill":"#76CDD3","type":"path","path":"M8.586,119.5H6c-2.757,0-5-2.243-5-5V6.5C1,3.898,3.053,1,6,1h129c2.757,0,5,2.243,5,5v108.5 c0,2.757-2.243,5-5,5H23.416l-7.415,7.414L8.586,119.5z"},{"stroke":"none","fill":"#FFFFFF","type":"path","path":"M135,2c2.209,0,4,1.791,4,4v108.5c0,2.209-1.791,4-4,4H23.002l-7.001,7L9,118.5H6c-2.209,0-4-1.791-4-4 V6.5C2,4.291,3.791,2,6,2H135 M135,0H6C2.804,0,0,3.038,0,6.5v108c0,3.309,2.691,6,6,6h2.172l6.415,6.414l1.414,1.414 l1.414-1.414l6.415-6.414H135c3.309,0,6-2.691,6-6V6C141,2.691,138.309,0,135,0L135,0z"},{"stroke":"#FFFFFF","stroke-width":2,"fill":"none","type":"path","path":"M2 90.5L139 90.5"}];
			var r = paper.add(infobulle);
			r.hide();
			x_bulle = value.x - 10;
			y_bulle = value.y - 140;
			r.transform("t" + x_bulle + "," + y_bulle);
			
			var riders = paper.text(value.x + 45, value.y- 125, value.nb);
			riders.attr({ "font-size": 17, "font-family": "BebasRegular" });
			riders.hide();
			
			var t = paper.text(value.x + 1, value.y- 85, value.text);
			t.attr({ "font-size": 13, "font-family": "Lato" });
			t.attr({'text-anchor': 'start'});
			t.hide();
			
			var station = paper.text(value.x + 58, value.y- 35, value.station);
			station.attr({"fill" : "#ffffff","font-size": 13, "font-family": "BebasRegular" });
			station.hide();
			
			var circle = paper.circle(value.x,value.y, value.radius);
			circle.attr("fill", "#76CDD3");
			circle.attr("stroke", "#ffffff");
			
			arr[circle.id] = r;
			arr_visible[circle.id] = false;
			
			all_riders[circle.id] = riders;
			arr_riders[circle.id] = false;
			
			all_station[circle.id] = station;
			arr_station[circle.id] = false;
			
			all_text[circle.id] = t;
			arr_text[circle.id] = false;
			
			circle.node.onmouseover = function () { 
				 this.style.cursor = 'pointer'; 
				for (x in arr)
				{
				 	var b = arr[x];
					var r = all_riders[x];
					var s = all_station[x];
					var t = all_text[x];
					arr_visible[x] = false;
					b.hide();
					r.hide();
					s.hide();
					t.hide();
				}
				arr_visible[circle.id] = !arr_visible[circle.id];
				var b = arr[circle.id];
				var r = all_riders[circle.id];
				var s = all_station[circle.id];
				var t = all_text[circle.id];
				if (arr_visible[circle.id]) {
					b.show();
					b.toFront();
					r.show();
					r.toFront();
					s.show();
					s.toFront();
					t.show();
					t.toFront();
				}else {
					b.hide();
					b.toBack();
					r.hide();
					r.toFront();
					s.hide();
					s.toFront();
					t.hide();
					t.toFront();
				}
			};
			
			circle.node.onmouseout = function () { 
				 this.style.cursor = 'pointer'; 
				for (x in arr)
				{
				 	var b = arr[x];
					var r = all_riders[x];
					var s = all_station[x];
					var t = all_text[x];
					arr_visible[x] = false;
					b.hide();
					r.hide();
					s.hide();
					t.hide();
				}
			};
		
		});
}