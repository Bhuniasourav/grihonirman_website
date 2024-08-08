<?php 
function convertMinutesToHours($minutes) {
    $hours = floor($minutes / 60); // Get the number of hours
    $remainingMinutes = $minutes % 60; // Get the remaining minutes

    if ($hours > 0) {
        return sprintf("%d hour%s %d minute%s", 
                       $hours, 
                       $hours != 1 ? "s" : "", 
                       $remainingMinutes, 
                       $remainingMinutes != 1 ? "s" : "");
    } else {
        return sprintf("%d minute%s", 
                       $remainingMinutes, 
                       $remainingMinutes != 1 ? "s" : "");
    }
}



function getnetdate($exDate){
    $date = new DateTime($exDate);
    $formatted_date = $date->format('d F Y');
    return $formatted_date;
}
?>