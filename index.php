<?php
// Import the file Data.php to use the Pos_Date class
require 'Date.php';
// Import the file Validator.php to use the Pos_Validator class
require 'Validator.php';


//Data from user useing the Post method
//Using the FILTER_SANITIZE_SPECIAL_CHARS to prevent any harmful input
$startDate = filter_var($_POST['startDate'], FILTER_SANITIZE_SPECIAL_CHARS);
$startDate_timezone_offset = filter_var($_POST['startDate_timezone_offset'], FILTER_SANITIZE_SPECIAL_CHARS);
$endDate = filter_var($_POST['endDate'], FILTER_SANITIZE_SPECIAL_CHARS);
$endDate_timezone_offset = filter_var($_POST['endDate_timezone_offset'], FILTER_SANITIZE_SPECIAL_CHARS);
$name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);


//Getting the year month date from the input and put each in a variable
//Using the substr function to get specific value
//Using the (int) to make the variable value integer
$firstDateYear = (int)substr($startDate, 0, 4);
$firstDateMonth = (int)substr($startDate, 4, 2);
$firstDateDay = (int)substr($startDate, 6, 2);
// Testing the input
/* echo $firstDateYear.'<br>'; 
echo $firstDateMonth.'<br>';
echo $firstDateDay.'<br>'; */
$secondDateYear = (int)substr($endDate, 0, 4);
$secondDateMonth = (int)substr($endDate, 4, 2);
$secondDateDay = (int)substr($endDate, 6, 2);
// Testing the input
/* echo $secondDateYear.'<br>'; 
echo $secondDateMonth.'<br>';
echo $secondDateDay.'<br>'; */

 //checkdate function to make sure the date is existed before send it to the Date class
 if(!checkdate($firstDateMonth, $firstDateDay, $firstDateYear)){
    echo "<div class='container1'>";
  echo '<span>Unable to count the difference between the two date due to a wrong input in Start date!</span><br>';
  echo "</div>";
} elseif (!checkdate($secondDateMonth, $secondDateDay, $secondDateYear)) {
    echo "<div class='container1'>";
  echo '<span>Unable to count the difference between the two date due to a wrong input in End date!</span><br>';
  echo "</div>";
} else {
  echo "<div class='container1'>";
  
  //Setting the time zone according to the first date user choice
  date_default_timezone_set($startDate_timezone_offset);
  //Using the Pos_Date class to create the first date
  $firstDate = new Pos_Date($startDate);
  //Import the time zone from the system that was set previously according to the user choice first date
  $timezone_object = date_default_timezone_get();
  //Send the date details to create the first date
  $firstDate->setDate($firstDateYear, $firstDateMonth, $firstDateDay);
  echo "<span>First date is $firstDate. with the time zone $timezone_object.</span><br>";
  
  //Setting the time zone according to the second date user choice
  date_default_timezone_set($endDate_timezone_offset);
  //Using the Pos_Date class to create the second date
  $secondDate = new Pos_Date($endDate);
  $firstDate = new Pos_Date($startDate);
  //Import the time zone from the system that was set previously according to the user choice second date
  $timezone_object = date_default_timezone_get();
  //Send the date details to create the second date
  $secondDate->setDate($secondDateYear, $secondDateMonth, $secondDateDay);
  echo "<span>Second date is $secondDate. with the time zone $timezone_object.</span><br>";
  
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
    echo "<span>Both cities are in the same time zone. There are <span class='warning'>$numberOfDatesDiff </span>Day(s) between the two dates.</span><br>";
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
      echo "<span>There are <span class='warning'>$numberOfDatesDiff </span> Days and $gap between the two dates.</span>";
      //Number of days will be affected
    }else if($offset1 < $offset2){
      $newResult = $numberOfDatesDiff - 1;
      if($newResult < 1){
        $newHours = 24 - $hours;
        echo "<span>There are 0 Day(s) and  $whichWay $newHours hour(s) $whichWay $minutes minutes between the two dates.</span>";
      }else{
        $newHours = 24 - $hours;
        echo "<span>There are $newResult Day(s) and  $whichWay $newHours hour(s) $whichWay $minutes minutes between the two dates.</span>";
      }
    }
  }
 echo "</div>";
}


// Validator

// Creating the variables
$missing = null;
$errors = null;
// Check if variable of specified type exists 'submit'
if (filter_has_var(INPUT_POST, 'submit')) {
    try {
        require_once 'Validator.php';// the class location
        $required = array('name' , 'email' , 'startDate', 'endDate');//putting the required fields in an array
        $val = new Pos_Validator($required);//create an object from the validator class
        $val->checkDateLength('startDate', 8, 8);//Start date has to have 8 characters
        $val->checkDateLength('endDate', 8, 8);//End date has to have 8 characters
        $val->checkTextLength('name', 3);//Nmae has to have minst 3 characters
        $val->removeTags('name');//Sanitizes a string by removing completely all tags
        $val->isEmail('email');//Checks whether the input conforms to the format of an email address.
        $val->validateDate('startDate');//validate startDate
        $val->validateDate('endDate');//validate endDate
        $filtered = $val->validateInput();
        $missing = $val->getMissing();//Returns an array of required items that have not been filled in
        $errors = $val->getErrors();//Returns an array containing the names of fields or variables that failed the validation test.
        if (!$missing && !$errors) {// Everything passed validation.
// The validated input is stored in $filtered.
        }
    } catch (Exception $e) {
        echo $e;
    }
}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="" method="post">
    
<?php
// If there are items inside the array
if ($missing) {
    echo '<div class="warning">The following required fields have not been filled in:';
    echo '<ul>';
    foreach ($missing as $field) {
        echo "<li>$field</li>";
    }
    echo '</ul></div>';
  }
  
  // Errors message for the name field
  if (isset($errors['name'])) {
    echo '<span class="warning">' . $errors['name'] . '</span><br>';
  }else{
    echo '<span class="welcome">Hi '. $name.'</span><br>';
  }
  ?>
  <label for="name">Name: </label>
  <input type="text" name="name" placeholder="Adam Smith"> <br>
  <?php
  // Errors message for the email field
  if (isset($errors['email'])) {
    echo '<span class="warning">' . $errors['email'] . '</span><br>';
  }
  ?>
  <label for="email">Email: </label>
  <input type="text" name="email" placeholder="Adam.Smith@mail.com"> <br>
  <?php
  //Errors message for the start date field
  if (isset($errors['startDate'])) {
    echo '<span class="warning">' . $errors['startDate'] . '</span><br>';
  }
  ?>
  <label for="startDate">Start date: </label>
<input type="datetime" name="startDate" placeholder="20201212">    <select name="startDate_timezone_offset" >
	<option value="Pacific/Midway"> Midway Island, Samoa</option>
                <option value="America/Adak"> Hawaii-Aleutian</option>
                <option value="Etc/GMT+10"> Hawaii</option>
                <option value="Pacific/Marquesas"> Marquesas Islands</option>
                <option value="Pacific/Gambier"> Gambier Islands</option>
                <option value="America/Anchorage"> Alaska</option>
                <option value="America/Ensenada"> Tijuana, Baja California</option>
                <option value="Etc/GMT+8"> Pitcairn Islands</option>
                <option value="America/Los_Angeles"> Pacific Time (US & Canada)</option>
                <option value="America/Denver"> Mountain Time (US & Canada)</option>
                <option value="America/Chihuahua"> Chihuahua, La Paz, Mazatlan</option>
                <option value="America/Dawson_Creek"> Arizona</option>
                <option value="America/Belize"> Saskatchewan, Central America</option>
                <option value="America/Cancun"> Guadalajara, Mexico City, Monterrey</option>
                <option value="Chile/EasterIsland"> Easter Island</option>
                <option value="America/Chicago"> Central Time (US & Canada)</option>
                <option value="America/New_York"> Eastern Time (US & Canada)</option>
                <option value="America/Havana"> Cuba</option>
                <option value="America/Bogota"> Bogota, Lima, Quito, Rio Branco</option>
                <option value="America/Caracas"> Caracas</option>
                <option value="America/Santiago"> Santiago</option>
                <option value="America/La_Paz"> La Paz</option>
                <option value="Atlantic/Stanley"> Faukland Islands</option>
                <option value="America/Campo_Grande"> Brazil</option>
                <option value="America/Goose_Bay"> Atlantic Time </option>
                <option value="America/Glace_Bay"> Atlantic Time (Canada)</option>
                <option value="America/St_Johns"> Newfoundland</option>
                <option value="America/Araguaina"> UTC-3</option>
                <option value="America/Montevideo"> Montevideo</option>
                <option value="America/Miquelon"> Miquelon, St. Pierre</option>
                <option value="America/Godthab"> Greenland</option>
                <option value="America/Argentina/Buenos_Aires"> Buenos Aires</option>
                <option value="America/Sao_Paulo"> Brasilia</option>
                <option value="America/Noronha"> Mid-Atlantic</option>
                <option value="Atlantic/Cape_Verde"> Cape Verde Is.</option>
                <option value="Atlantic/Azores"> Azores</option>
                <option value="Europe/Belfast">wich Mean Time : Belfast</option>
                <option value="Europe/Dublin">wich Mean Time : Dublin</option>
                <option value="Europe/Lisbon">wich Mean Time : Lisbon</option>
                <option value="Europe/London">wich Mean Time : London</option>
                <option value="Africa/Abidjan">via, Reykjavik</option>
                <option value="Europe/Amsterdam" selected> Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                <option value="Europe/Belgrade"> Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                <option value="Europe/Brussels"> Brussels, Copenhagen, Madrid, Paris</option>
                <option value="Africa/Algiers"> West Central Africa</option>
                <option value="Africa/Windhoek"> Windhoek</option>
                <option value="Asia/Beirut"> Beirut</option>
                <option value="Africa/Cairo"> Cairo</option>
                <option value="Asia/Gaza"> Gaza</option>
                <option value="Africa/Blantyre"> Harare, Pretoria</option>
                <option value="Asia/Jerusalem"> Jerusalem</option>
                <option value="Europe/Minsk"> Minsk</option>
                <option value="Asia/Damascus"> Syria</option>
                <option value="Europe/Moscow"> Moscow, St. Petersburg, Volgograd</option>
                <option value="Africa/Addis_Ababa"> Nairobi</option>
                <option value="Asia/Tehran"> Tehran</option>
                <option value="Asia/Dubai"> Abu Dhabi, Muscat</option>
                <option value="Asia/Yerevan"> Yerevan</option>
                <option value="Asia/Kabul"> Kabul</option>
                <option value="Asia/Yekaterinburg"> Ekaterinburg</option>
                <option value="Asia/Tashkent"> Tashkent</option>
                <option value="Asia/Kolkata"> Chennai, Kolkata, Mumbai, New Delhi</option>
                <option value="Asia/Katmandu"> Kathmandu</option>
                <option value="Asia/Dhaka"> Astana, Dhaka</option>
                <option value="Asia/Novosibirsk"> Novosibirsk</option>
                <option value="Asia/Rangoon"> Yangon (Rangoon)</option>
                <option value="Asia/Bangkok"> Bangkok, Hanoi, Jakarta</option>
                <option value="Asia/Krasnoyarsk"> Krasnoyarsk</option>
                <option value="Asia/Hong_Kong"> Beijing, Chongqing, Hong Kong, Urumqi</option>
                <option value="Asia/Irkutsk"> Irkutsk, Ulaan Bataar</option>
                <option value="Australia/Perth"> Perth</option>
                <option value="Australia/Eucla"> Eucla</option>
                <option value="Asia/Tokyo"> Osaka, Sapporo, Tokyo</option>
                <option value="Asia/Seoul"> Seoul</option>
                <option value="Asia/Yakutsk"> Yakutsk</option>
                <option value="Australia/Adelaide"> Adelaide</option>
                <option value="Australia/Darwin"> Darwin</option>
                <option value="Australia/Brisbane"> Brisbane</option>
                <option value="Australia/Hobart"> Hobart</option>
                <option value="Asia/Vladivostok"> Vladivostok</option>
                <option value="Australia/Lord_Howe"> Lord Howe Island</option>
                <option value="Etc/GMT-11"> Solomon Is., New Caledonia</option>
                <option value="Asia/Magadan"> Magadan</option>
                <option value="Pacific/Norfolk"> Norfolk Island</option>
                <option value="Asia/Anadyr"> Anadyr, Kamchatka</option>
                <option value="Pacific/Auckland"> Auckland, Wellington</option>
                <option value="Etc/GMT-12"> Fiji, Kamchatka, Marshall Is.</option>
                <option value="Pacific/Chatham"> Chatham Islands</option>
                <option value="Pacific/Tongatapu"> Nuku'alofa</option>
                <option value="Pacific/Kiritimati"> Kiritimati</option>
</select><br>
  <?php
  //Errors message for the end date field
  if (isset($errors['endDate'])) {
    echo '<span class="warning">' . $errors['endDate'] . '</span><br>';
  }
?>
    <label for="endDate">End date: </label>
    <input type="datetime" name="endDate" placeholder="20201212">
    <select name="endDate_timezone_offset" >
	<option value="Pacific/Midway"> Midway Island, Samoa</option>
                <option value="America/Adak"> Hawaii-Aleutian</option>
                <option value="Etc/GMT+10"> Hawaii</option>
                <option value="Pacific/Marquesas"> Marquesas Islands</option>
                <option value="Pacific/Gambier"> Gambier Islands</option>
                <option value="America/Anchorage"> Alaska</option>
                <option value="America/Ensenada"> Tijuana, Baja California</option>
                <option value="Etc/GMT+8"> Pitcairn Islands</option>
                <option value="America/Los_Angeles"> Pacific Time (US & Canada)</option>
                <option value="America/Denver"> Mountain Time (US & Canada)</option>
                <option value="America/Chihuahua"> Chihuahua, La Paz, Mazatlan</option>
                <option value="America/Dawson_Creek"> Arizona</option>
                <option value="America/Belize"> Saskatchewan, Central America</option>
                <option value="America/Cancun"> Guadalajara, Mexico City, Monterrey</option>
                <option value="Chile/EasterIsland"> Easter Island</option>
                <option value="America/Chicago"> Central Time (US & Canada)</option>
                <option value="America/New_York"> Eastern Time (US & Canada)</option>
                <option value="America/Havana"> Cuba</option>
                <option value="America/Bogota"> Bogota, Lima, Quito, Rio Branco</option>
                <option value="America/Caracas"> Caracas</option>
                <option value="America/Santiago"> Santiago</option>
                <option value="America/La_Paz"> La Paz</option>
                <option value="Atlantic/Stanley"> Faukland Islands</option>
                <option value="America/Campo_Grande"> Brazil</option>
                <option value="America/Goose_Bay"> Atlantic Time </option>
                <option value="America/Glace_Bay"> Atlantic Time (Canada)</option>
                <option value="America/St_Johns"> Newfoundland</option>
                <option value="America/Araguaina"> UTC-3</option>
                <option value="America/Montevideo"> Montevideo</option>
                <option value="America/Miquelon"> Miquelon, St. Pierre</option>
                <option value="America/Godthab"> Greenland</option>
                <option value="America/Argentina/Buenos_Aires"> Buenos Aires</option>
                <option value="America/Sao_Paulo"> Brasilia</option>
                <option value="America/Noronha"> Mid-Atlantic</option>
                <option value="Atlantic/Cape_Verde"> Cape Verde Is.</option>
                <option value="Atlantic/Azores"> Azores</option>
                <option value="Europe/Belfast">wich Mean Time : Belfast</option>
                <option value="Europe/Dublin">wich Mean Time : Dublin</option>
                <option value="Europe/Lisbon">wich Mean Time : Lisbon</option>
                <option value="Europe/London">wich Mean Time : London</option>
                <option value="Africa/Abidjan">via, Reykjavik</option>
                <option value="Europe/Amsterdam" selected> Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                <option value="Europe/Belgrade"> Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                <option value="Europe/Brussels"> Brussels, Copenhagen, Madrid, Paris</option>
                <option value="Africa/Algiers"> West Central Africa</option>
                <option value="Africa/Windhoek"> Windhoek</option>
                <option value="Asia/Beirut"> Beirut</option>
                <option value="Africa/Cairo"> Cairo</option>
                <option value="Asia/Gaza"> Gaza</option>
                <option value="Africa/Blantyre"> Harare, Pretoria</option>
                <option value="Asia/Jerusalem"> Jerusalem</option>
                <option value="Europe/Minsk"> Minsk</option>
                <option value="Asia/Damascus"> Syria</option>
                <option value="Europe/Moscow"> Moscow, St. Petersburg, Volgograd</option>
                <option value="Africa/Addis_Ababa"> Nairobi</option>
                <option value="Asia/Tehran"> Tehran</option>
                <option value="Asia/Dubai"> Abu Dhabi, Muscat</option>
                <option value="Asia/Yerevan"> Yerevan</option>
                <option value="Asia/Kabul"> Kabul</option>
                <option value="Asia/Yekaterinburg"> Ekaterinburg</option>
                <option value="Asia/Tashkent"> Tashkent</option>
                <option value="Asia/Kolkata"> Chennai, Kolkata, Mumbai, New Delhi</option>
                <option value="Asia/Katmandu"> Kathmandu</option>
                <option value="Asia/Dhaka"> Astana, Dhaka</option>
                <option value="Asia/Novosibirsk"> Novosibirsk</option>
                <option value="Asia/Rangoon"> Yangon (Rangoon)</option>
                <option value="Asia/Bangkok"> Bangkok, Hanoi, Jakarta</option>
                <option value="Asia/Krasnoyarsk"> Krasnoyarsk</option>
                <option value="Asia/Hong_Kong"> Beijing, Chongqing, Hong Kong, Urumqi</option>
                <option value="Asia/Irkutsk"> Irkutsk, Ulaan Bataar</option>
                <option value="Australia/Perth"> Perth</option>
                <option value="Australia/Eucla"> Eucla</option>
                <option value="Asia/Tokyo"> Osaka, Sapporo, Tokyo</option>
                <option value="Asia/Seoul"> Seoul</option>
                <option value="Asia/Yakutsk"> Yakutsk</option>
                <option value="Australia/Adelaide"> Adelaide</option>
                <option value="Australia/Darwin"> Darwin</option>
                <option value="Australia/Brisbane"> Brisbane</option>
                <option value="Australia/Hobart"> Hobart</option>
                <option value="Asia/Vladivostok"> Vladivostok</option>
                <option value="Australia/Lord_Howe"> Lord Howe Island</option>
                <option value="Etc/GMT-11"> Solomon Is., New Caledonia</option>
                <option value="Asia/Magadan"> Magadan</option>
                <option value="Pacific/Norfolk"> Norfolk Island</option>
                <option value="Asia/Anadyr"> Anadyr, Kamchatka</option>
                <option value="Pacific/Auckland"> Auckland, Wellington</option>
                <option value="Etc/GMT-12"> Fiji, Kamchatka, Marshall Is.</option>
                <option value="Pacific/Chatham"> Chatham Islands</option>
                <option value="Pacific/Tongatapu"> Nuku'alofa</option>
                <option value="Pacific/Kiritimati"> Kiritimati</option><br>
</select><br>
    
    <input type="submit" value="Submit" name="submit">
    </form>
</div>
</body>
</html>


                