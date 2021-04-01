<?php
require_once 'public\simple_html_dom.php';

//get html content from the site.
$dom = file_get_contents('https://www.malkey.lk/rates/self-drive-rates.html');
preg_match('#<div class="rates desktop-view-rates"><div class="table-responsive"><table class="table selfdriverates"><thead><tr class="table-header"><th class="darkgray text-center percent-40">VEHICLES</th></tr></thead></table></div></div>#', $dom, $match);

print_r($match);
// $answer=array();
// if(!empty($dom)){
//     $divClass="";$title="";$i=0;
//     foreach($dom->find("table.selfriverates tr") as $divClass){
//         foreach($divClass->find("td.text-left.percent-40") as $title){
//             $answer[$i]['title']=$title->plaintext;
//         }
//         foreach($divClass->find('td.darkgray.text-center.percent-22') as $price){
//             $answer[$i]['price']=trim($price->plaintext);
//         }
//         $i++;
//     }

// }
// print_r($answer);