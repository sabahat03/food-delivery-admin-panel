<?php
// Assuming you have an array of provinces/regions with delivery areas
$provinces = [
    "Punjab" => ["Lahore", "Rawalpindi", "Multan", "Islamabad", "Faisalabad"],
    "Sindh" => ["Karachi", "Hyderabad", "Sukkur", "Larkana"],
    "Khyber Pakhtunkhwa" => ["Peshawar", "Abbottabad", "Swat", "Mardan"],
    "Balochistan" => ["Quetta", "Gwadar", "Turbat", "Khuzdar"],
    "Gilgit-Baltistan" => ["Gilgit", "Skardu", "Hunza"],
    "Azad Kashmir" => ["Muzaffarabad", "Mirpur", "Kotli"]
    // Add more provinces and their respective areas as needed
];

foreach ($provinces as $province => $areas) {
    echo "<div class='province-card'>";
    echo "<h2 class='province-title'>$province</h2>";
    echo "<ul class='area-list'>";
    foreach ($areas as $area) {
        echo "<li class='area-list-item'>$area</li>";
    }
    echo "</ul>";
    echo "</div>";
}
?>
