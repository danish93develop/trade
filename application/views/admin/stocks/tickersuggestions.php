<ul>
<?php
    //print_r($result);
    if(isset($result->bestMatches) and !empty($result->bestMatches)):
        foreach($result->bestMatches as $key=>$value){
            $company_name = $currency_symbol = '';
            foreach($value as $dataKey => $dataValue){                
                list($order, $keyname) = explode(". ",$dataKey);
                if($keyname == "name" ){
                    $company_name = $dataValue;
                }else if($keyname == "symbol" ){
                    $currency_symbol = $dataValue;
                }
            }
        ?>
        <li onClick="addNewTicker('<?=$company_name?>','<?=$currency_symbol?>')"><?=$currency_symbol.'-'.$company_name?></li>
<?php   }
     else:  ?>
     <li> No data Found</li>
<?php endif; ?>

</ul>

