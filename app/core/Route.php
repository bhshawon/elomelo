<?php
namespace core;
class Route
{
  private static $tmp = array();

  public static function getRoutParams($route, $url){

    preg_match_all('/\{(.*?)\}/', $route, $matches);

    $strUrlRegex=preg_replace('/\{(.*?)\}/', '([^)]+)', $route);

    $strUrlRegex = str_replace('/', '\/', $strUrlRegex);

    $urlArray=[];


    if(preg_match('/^'. $strUrlRegex . '$/', $url, $values))
    {
      for($i=0;$i<count($matches[1]);$i++)
      {
        $urlArray[$matches[1][$i]]=$values[$i + 1];
      }
      return $urlArray;
    }
    return FALSE;
  }
}
