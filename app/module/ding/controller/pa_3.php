<?php
header("Content-type: text/html; charset=utf-8");

$str=file_get_contents("https://www.easthome.com/front/courseSyllabuss/list/searchables?page.pn=1&page.size=30");

//拿出网页中所有《a》标签放到数组
$reg1="/<a .*?>.*?<\/a>/";
$aarray;//这个存放的就是正则匹配出来的所有《a》标签数组
preg_match_all($reg1,$str,$aarray);


//拿出《a》标签中的链接和标签内容
$hrefarray;//这个存放的是匹配出来的href的链接地址
$acontent;//存放匹配出来的a标签的内容
$reg2="/href=\"([^\"]+)/";
for($i=0;$i<count($aarray[0]);$i++){
preg_match_all($reg2,$aarray[0][$i],$hrefarray);
echo $hrefarray[1][0]."\r\n";//这里输出的就是遍历出来的所有a标签的链接
//拿出《a》标签的内容
$reg3="/>(.*)<\/a>/";
preg_match_all($reg3,$aarray[0][$i],$acontent);
echo $acontent[1][0]."\r\n";//这里输出的就是a标签的文字了
}
?>