<?php
$worker = new GearmanWorker();
$worker->addServer('127.0.0.1', '4730');

/*Тут мы говорим, что готовы обработать ф-ю function_revert_string_and_caps, и что заниматься этим будет ф-я 'revCaps*/
$worker->addFunction('some_function', 'revCaps');


while($worker->work()){};


//Ну и сама ф-я обработчик, аргумент один - объект-задание job
function revCaps($job){

    /*Извлекаем из job данные, переданные клиентом*/
    $content = $job->workload();

    return mb_strtoupper(strrev($content));
}