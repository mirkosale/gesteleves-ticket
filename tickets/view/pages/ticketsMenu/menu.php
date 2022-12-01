<!--Home content-->
<div class="main">
    <?php
        $testArray = array(
            array("username" => "Antonio", "title" => "problèmes de connexion", "category" => "Connexion", "priority" => 2),
            array("username" => "Da Cruz", "title" => "problèmes d'affichage", "category" => "Affichage", "priority" => 1),
        );

    ?>
        <div class="contentTickets">
    <?php
        foreach ($testArray as $key => $value) {
            ?>
            <div class="ticket">
                <div class="Username"><?=$testArray[$key]['username']?></div>
                <div class="Title"><?=$testArray[$key]['title']?></div>
                <div class="Category"><?=$testArray[$key]['category']?></div>
                <div class="Priority"><?=$testArray[$key]['priority']?></div>
            </div>
            <?php
        }
    ?>
        </div>
</div>