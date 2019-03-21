<?php

require_once 'inc/db.class.php';
require_once 'inc/dbconf.php';
require_once 'inc/_definition.php';
require_once 'inc/_helper.php';
require_once "inc/_prepare.php";
require_once 'inc/_paesse.php';
require_once 'inc/_laender_und_regionen.php';
require_once 'inc/_smallfixes.php';

Migrate(3);
function Migrate($startstep = 0){
    $maxsteps = 6;
    for($step = $startstep;$step <= $maxsteps;$step++){

            DebugOut("Migrate Step $step " .LineEnd() );
            //0
            if($step == 0){ prepareTable(true); }  //// 0 - läuft
            //1
            if($step == 1){ prepareLaenderUndRegionen(true); }  //// 1 - läuft
            //2
            if($step == 2){ fFillSomeSmallTables(true); } //// 2 - läuft
            //3
            if($step == 3){ fFillSomeMultiTables(true);  }
            //4
            if($step == 4){  }
            //5
            if($step == 5){  }
            //6
            if($step == 6){  }
    }
}




