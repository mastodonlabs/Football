<?php

$name_to_id = array(
'Ravens' => 'BAL',
'Bengals' => 'CIN',
'Browns' => 'CLE',
'Steelers' => 'PIT',
'Texans' => 'HOU',
'Colts' => 'IND',
'Jaguars' => 'JAX',
'Titans' => 'TEN',
'Bills' => 'BUF',
'Dolphins' => 'MIA',
'Patriots' => 'NE',
'Jets' => 'NYJ',
'Broncos' => 'DEN',
'Chiefs' => 'KC',
'Raiders' => 'OAK',
'Chargers' => 'SD',
'Bears' => 'CHI',
'Lions' => 'DET',
'Packers' => 'GB',
'Vikings' => 'MIN',
'Falcons' => 'ATL',
'Panthers' => 'CAR',
'Saints' => 'NO',
'Buccaneers' => 'TB',
'Cowboys' => 'DAL',
'Giants' => 'NYG',
'Eagles' => 'PHI',
'Redskins' => 'WAS',
'Cardinals' => 'ARI',
'49ers' => 'SF',
'Seahawks' => 'SEA',
'Rams' => 'STL'
);

$year = 2011;
$date = '';
$game_date = '';
$game_time = '';
$week = '';
$home_id = '';
$away_id = '';
$time = '';


$games_in = 'schedule.txt';
$games_out = 'games.txt';

$in = fopen( $games_in,'r');
$out = fopen( $games_out,'a+');

if ( ! $in )
{
	die("could not open file: ${games_in}\n\n");
}
if ( ! $out )
{
	die("could not open file: ${games_out}\n\n");
}

$game_id = 0;
while ( ! feof($in) )
{
	$line = fgets($in);
	$matches = array();

	# echo $line;

	if ( preg_match("/^\s*$/", $line) )
	{
		// Skip empty lines
		continue;		
	} 

	if ( preg_match("/^Bye/i", $line) )
	{
		// Skip Bye Games 
		continue;		
	} 

	// Determine the Current Week
	if ( preg_match("/^Week (\d+)/", $line, $matches) )
	{
		$game_date = '';
		$game_time = '';

		$week = $matches[1];

		continue;
	} 

	// Determine the Date
	if ( preg_match("/^(Thursday|Friday|Saturday|Sunday|Monday)/", $line, $matches) )
	{
		list($weekday, $month, $day) = preg_split("/\W+/", $line);
		$game_date = format_date($year, $month, $day);	
		continue;
	} 

	if ( preg_match("/^(\w+) at (\w+)/", $line, $matches) )
	{
		$away = $matches[1];	
		$away_id = $name_to_id[$away];

		$home = $matches[2];
		$home_id = $name_to_id[$home];

		// Extract the time
		preg_match("/(\d+:\d\d) (\w+)$/", $line, $matches);
		$game_time = parse_time($matches[1],  $matches[2]);

		$game_id++;
	} 


	$record = sprintf("%d\t%d\t%s\t%s\t%s %s\n", $game_id, $week, $away_id, $home_id, $game_date, $game_time);	
	echo($record);
	fwrite($out, $record);
}

fclose($in); 
fclose($out); 

/*========================================================================
 *            FUNCTIONS  
 *========================================================================
 */

function parse_time($time, $ampm)
{
	$seconds = 0;
	list($hour, $minutes) = preg_split("/:/", $time);

	if ( $ampm == 'PM' && $hour < 12 )
	{
		$hour += 12;
	}
	return sprintf("%02d:%02d:%02d", $hour, $minutes, $seconds);	
}

function format_date($year, $month, $day)
{
	switch ($month){
		case "Sept":
			$month_num = '9';
			break;

		case "Oct":
			$month_num = '10';
			break;

		case "Nov":
			$month_num = '11';
			break;

		case "Dec":
			$month_num = '12';
			break;

		case "Jan":
			$month_num = '1';
			$year++;
			break;

		case "Feb":
			$month_num = '2';
			$year++;
			break;
	}

	$formatted = sprintf("%d-%02d-%02d", $year, $month_num, $day);

	return $formatted;
}

function debug_object($data, $output = 'print_r', $die = FALSE )
{

	echo '<pre>';
	if ( $output == 'var_dump' )
	{
		var_dump( $data );
	}
	else
	{
		print_r( $data );
	}	
	echo '</pre>';
	
	if ( $die )
	{
		die("Program Terminated.\n");
	}

}



