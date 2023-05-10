<?php
function processAge($birthdate): string {
    $birth_date = new DateTime($birthdate);
    $today = new DateTime();
    $diff = $today->diff($birth_date);
    return $diff->format('%y years, %m months, %d days');
}

$birthdate = "2003-10-15";
try {
    printf("%s\n", "Age: ".processAge($birthdate));
} catch (Exception $e) {
    printf("%s\n", $e->getTraceAsString());
}