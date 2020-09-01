<?php
// Import the file Data.php to use the Pos_Date class
require 'Date.php';
// Import the file Validator.php to use the Pos_Validator class
require 'Validator.php';

//Data from user useing the Post method
$startDate = $_POST['startDate'];
$startDate_timezone_offset = $_POST['startDate_timezone_offset'];
$endDate = $_POST['endDate'];
$endDate_timezone_offset = $_POST['endDate_timezone_offset'];


//Getting the year month date from the input and put each in a variable
//Using the substr function to get specific value
//Using the (int) to make the variable value integer
$firstDateYear = (int)substr($startDate, 0, 4);
$firstDateMonth = (int)substr($startDate, 5, 2);
$firstDateDay = (int)substr($startDate, 8, 2);

$secondDateYear = (int)substr($endDate, 0, 4);
$secondDateMonth = (int)substr($endDate, 5, 2);
$secondDateDay = (int)substr($endDate, 8, 2);


//Setting the time zone according to the first date user choice
date_default_timezone_set($startDate_timezone_offset);
//Using the Pos_Date class to create the first date
$firstDate = new Pos_Date($startDate);
//Import the time zone from the system that was set previously according to the user choice first date
$timezone_object = date_default_timezone_get();
//Send the date details to create the first date
$firstDate->setDate($firstDateYear, $firstDateMonth, $firstDateDay);
echo "First date is $firstDate. with the time zone $timezone_object.<br>";

//Setting the time zone according to the second date user choice
date_default_timezone_set($endDate_timezone_offset);
//Using the Pos_Date class to create the second date
$secondDate = new Pos_Date($endDate);
$firstDate = new Pos_Date($startDate);
//Import the time zone from the system that was set previously according to the user choice second date
$timezone_object = date_default_timezone_get();
//Send the date details to create the second date
$secondDate->setDate($secondDateYear, $secondDateMonth, $secondDateDay);
echo "Second date is $secondDate. with the time zone $timezone_object.<br>";

//Using the Pos_Date::dateDiff to count the days difference between the two dates
$numberOfDatesDiff = Pos_Date::dateDiff($firstDate, $secondDate);

// Create DateTimeZone objects for each time zone.
$first_timezone_offset = new DateTimeZone($startDate_timezone_offset);
$second_timezone_offset = new DateTimeZone($endDate_timezone_offset);
// Use $first_timezone_offset to get the current date and time in $startDate_timezone_offset.
// Notice that you need the date and time in only one time zone
// to work out the time difference between them.
$now = new DateTime('now', $first_timezone_offset);
// Work out the offset from UTC in time zone 1.
$offset1 = $first_timezone_offset->getOffset($now);
// Use the date and time in time zone 1 to get the UTC offset in the other time zone.
$offset2 = $second_timezone_offset->getOffset($now);
// Work out the time difference by subtracting one offset from the other.
$diff = $offset1 - $offset2;

if ($diff == 0) {
	echo "Both cities are in the same time zone. There are $numberOfDatesDiff Day(s) between the two dates.";
} else {
  // is it + or -
  $whichWay = ($offset1 > $offset2) ? '+' : '-';
	// Converting the time difference from seconds.
	// Useing the abs() function to convert negative numbers to positive.
	// Useing the floor() function to get an integer. 
	$hours = floor(abs($diff)/60/60);
	// Use modulo to see if there is a remainder.
	// The remainder will still be in seconds,
	// so it needs to be divided by 60. 
	$minutes = ((abs($diff)%3600)/60);
	// Format the time difference as a string.
	$gap = "$hours hour(s) $minutes minutes";
  
  //Number of days will not be affected
  if ($offset1 > $offset2){
    echo "There are $numberOfDatesDiff Days and $gap between the two dates.";
    //Number of days will be affected
  }else if($offset1 < $offset2){
    $newResult = $numberOfDatesDiff - 1;
    if($newResult < 1){
      $newHours = 24 - $hours;
      echo "There are 0 Day(s) and  $whichWay $newHours hour(s) $whichWay $minutes minutes between the two dates.";
    }else{
      $newHours = 24 - $hours;
      echo "There are $newResult Day(s) and  $whichWay $newHours hour(s) $whichWay $minutes minutes between the two dates.";
    }
  }
}


// Validator


    

 