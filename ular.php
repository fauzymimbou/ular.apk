<?php
 
function kalender($month,$year) {
 
    // Create array containing abbreviations of days of week.
    $daysOfWeek = array('S','M','T','W','T','F','S');
 
    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
 
    // How many days does this month contain?
    $numberDays = date('t',$firstDayOfMonth);
 
    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);
 
    // What is the name of the month in question?
    $monthName = $dateComponents['month'];
 
    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];
 
    // Create the table tag opener and day headers
 
    $calendar = "<table class='calendar'>";
    $calendar .= "<caption>$monthName $year</caption>";
    $calendar .= "<tr>";
 
    // Create the calendar headers
 
    foreach($daysOfWeek as $day) {
      $calendar .= "<th class='header'>$day</th>";
 }

 // Create the rest of the calendar

 // Initiate the day counter, starting with the 1st.

 $currentDay = 1;

 $calendar .= "</tr><tr>";

 // The variable $dayOfWeek is used to
 // ensure that the calendar
 // display consists of exactly 7 columns.

 if ($dayOfWeek > 0) {
      $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
 }

 $month = str_pad($month, 2, "0", STR_PAD_LEFT);

 while ($currentDay <= $numberDays) {

      // Seventh column (Saturday) reached. Start a new row.

      if ($dayOfWeek == 7) {
 
        $dayOfWeek = 0;
        $calendar .= "</tr><tr>";

   }

   $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

   $date = "$year-$month-$currentDayRel";

   $calendar .= "<td class='day' rel='$date'>$currentDay</td>";

   // Increment counters

   $currentDay++;
   $dayOfWeek++;

}

// Complete the row of the last week in month, if necessary

if ($dayOfWeek != 7) {

   $remainingDays = 7 - $dayOfWeek;
   $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";

  }
 
  $calendar .= "</tr>";

  $calendar .= "</table>";

  return $calendar;

}
?>

<h1>Kalender Tahun 2017</h1>
    <tr>
        <td><?php echo kalender(01,2017); ?></td>
        <td><?php echo kalender(02,2017); ?></td>
        <td><?php echo kalender(03,2017); ?></td>
        <td class="april"><?php echo kalender(04,2017); ?></td>
    </tr>
    <tr>
        <td><?php echo kalender(05,2017); ?></td>
        <td><?php echo kalender(06,2017); ?></td>
        <td class="juli"><?php echo kalender(07,2017); ?></td>
        <td><?php echo kalender(08,2017); ?></td>
    </tr>
    <tr>
        <td><?php echo kalender(09,2017); ?></td>
        <td><?php echo kalender(10,2017); ?></td>
        <td><?php echo kalender(11,2017); ?></td>
        <td class="des"><?php echo kalender(12,2017); ?></td>
    </tr>
</table>
<style>
*{margin:0; padding: 0;}
    table{padding: 10px; margin:auto; font-size: 24px}
    h1{text-align: center}
    .april{padding-top: 37px}
    .juli{padding-top: 37px;}
    .des{padding-top: 37px;}
    caption{background: black; color:white;}
    .header{background: gray; color:white;}
    .day{background: #f3f3f3;text-align: right; padding:3px;}
</style>
