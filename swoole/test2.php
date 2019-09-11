<?php
function t1() {
    Co::sleep(0.05);
    echo __METHOD__.PHP_EOL;
}

function t2() {
    Co::sleep(0.05);
    echo __METHOD__.PHP_EOL;
}

function t3() {
    Co::sleep(0.05);
    echo __METHOD__.PHP_EOL;
}


go("t1");
go("t2");
go("t3");