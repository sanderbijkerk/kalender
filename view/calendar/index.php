<div class="container">
        <h2>Kalender</h2>
		<?php 
        $months = array("null", "Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus",
        "September", "Oktober", "November", "December");
        $lastMonth = 0;
        $lastDay = 0;
            foreach ($birthdays as $birthday) {
                if($lastMonth != $birthday['month']) {
                $lastMonth = $birthday['month'];
                echo "<h1>" . $months[$lastMonth] . "</h1>";
                    
                
                }
                if($lastDay != $birthday['day']){
                echo "<h2>". $birthday["day"] ."</h2>";
                $lastDay = $birthday['day'];
            }
                echo "<p>";
                echo "<a href=edit/". $birthday["id"] ."'>";
                echo $birthday["name"]."(".$birthday["year"] .")</a>";
                echo "<a href=delete/".$birthday["id"] .">x</a>";
                }
        ?>
        <p><a href="<?= URL ?>calendar/create"><b>Verjaardag toevoegen</b></a></p>
</div>