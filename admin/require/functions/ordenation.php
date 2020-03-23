<?php

function ordenation($order, $itemOrdenacao, $allItems = array(), $nameTable) {

	if($order < $itemOrdenacao && $order >= 0) {

      // CHANGED VALUES ORDENATION 
      for ($i = 0; $i < count($allItems); $i++) {
        
        if($order <= $allItems[$i]['ordenation'] && $allItems[$i]['ordenation'] <= $itemOrdenacao) {

          update(
            array('ordenation'), 
            array($allItems[$i]['ordenation'] + 1), 
            $nameTable, "id=" . $allItems[$i]['id']
          );

        }

      }

    }

    // VEREFY IF ORDENATION IS BIGGER 
    elseif($order > $itemOrdenacao) {
      // CHANGED VALUES ORDENATION 
      for ($i = 0; $i < count($allItems); $i++) {
        
        if($order >= $allItems[$i]['ordenation'] && $allItems[$i]['ordenation'] >= $itemOrdenacao) {

          update(
            array('ordenation'), 
            array($allItems[$i]['ordenation'] - 1), 
            $nameTable, "id=" . $allItems[$i]['id']
          );

        }

      }

    }

    return $order;

}