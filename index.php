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
    <form action="date.inc.php" method="post">
    <input type="datetime" name="startDate" placeholder="Start date" required>
    <select name="startDate_timezone_offset" >
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
    <input type="datetime" name="endDate" placeholder="End date" required>
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
    <input type="text" name="" id=""> <br>
    <input type="email" name="" id=""> <br>
    <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>


                