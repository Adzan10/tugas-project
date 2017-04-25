<?php
	$json_string1 = file_get_contents("http://api.wunderground.com/api/c70c919862002b41/conditions/q/IA/mugas.json");
	$json_string2 = file_get_contents("http://api.wunderground.com/api/c70c919862002b41/astronomy/q/IA/Mugas.json");
	$json_string3 = file_get_contents("http://api.wunderground.com/api/c70c919862002b41/forecast/q/IA/Mugas.json");
	$json_string4 = file_get_contents("http://api.wunderground.com/api/c70c919862002b41/planner_07010731/q/IA/Mugas.json");
	$json_string5 = file_get_contents("http://api.wunderground.com/api/c70c919862002b41/yesterday/q/IA/Mugas.json");
	
	$parsed_json1 = json_decode ($json_string1);
	$parsed_json2 = json_decode ($json_string2);
	$parsed_json3 = json_decode ($json_string3);
	$parsed_json4 = json_decode ($json_string4);
	$parsed_json5 = json_decode ($json_string5);

	$location = $parsed_json1->{'current_observation'}->{'display_location'}->{'full'};
	$date = $parsed_json1->{'current_observation'}->{'local_time_rfc822'};
	$suhu = $parsed_json1->{'current_observation'}->{'temp_c'};
	$angin = $parsed_json1->{'current_observation'}->{'wind_mph'};
	
	$sunrise_jam = $parsed_json2->{'moon_phase'}->{'sunrise'}->{'hour'};
	$sunrise_mt = $parsed_json2->{'moon_phase'}->{'sunrise'}->{'minute'};
	$sunset_jam = $parsed_json2->{'moon_phase'}->{'sunset'}->{'hour'};
	$sunset_mt = $parsed_json2->{'moon_phase'}->{'sunrise'}->{'minute'};
	
	$icon = $parsed_json3->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'icon'};

	$min = $parsed_json4->{'trip'}->{'temp_high'}->{'min'}->{'C'};
 	 $max = $parsed_json4->{'trip'}->{'temp_high'}->{'max'}->{'C'};
 	 $avg = $parsed_json4->{'trip'}->{'temp_high'}->{'avg'}->{'C'};

	$kemarin = $parsed_json5->{'history'}->{'date'}->{'pretty'};
	$kemarin_lusa= $parsed_json5->{'history'}->{'utcdate'}->{'pretty'};
	
	echo "Pada daerah ${location}. dapat diketahui bahwa:";
	echo "<br>";
	echo "<br>";
	echo "<br>";

	echo"&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<img src='http://icons.wxug.com/i/c/k/".$icon.".gif'> <br/>";
	echo "<br>";
	echo "<br>";
	echo " ${date}";
	
	echo "<br>";
	echo "<br>";
	echo "Sunrise pada pukul ${sunrise_jam}:${sunrise_mt}\n";
	echo "<br>";
	echo "Sunset pada pukul ${sunset_jam}:${sunset_mt}\n";

	echo "<br>";
	echo "<br>";

	echo "Suhu : ${suhu} <sup> o </sup>C";
	echo "<br>";
	echo "Minimal : ${min} <sup> o </sup>C\n";
  	echo "<br>";
  	echo "Maximal : ${max} <sup> o </sup>C\n";
  	echo "<br>";
 	echo "Rata-rata : ${avg} <sup> o </sup>C\n";
	
	echo "<br>";
	
	echo "Kecepatan Angin : ${angin} meter/jam";
	
	echo "<br>";
	echo "<br>";

	echo "Keterangan Lain ";
	echo "<br>";
	echo "Tanggal kemarin adalah : ${kemarin}\n";
	echo "<br>";
	echo "Tanggal kemarin lusa adalah : ${kemarin_lusa}\n";
	echo "<br>";