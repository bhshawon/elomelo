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
  /*public static function GetRoutParams($strUrlTemplate, $strUrl)
  {
    $strUrlRegex = preg_replace_callback('~\{([^{}]+)\}~',
    function ($matches)
    {
      $repl = '([^)]+)';
      self::$tmp[] = $matches[1];
      return $repl;
    }
    , $strUrlTemplate);

    $UrlArray = array();
    $matches = array();
    $strUrlRegex = str_replace('/', '\/', $strUrlRegex);

    
    echo "<br> tmp";
    print_r(self::$tmp);
    if (preg_match("/^" . $strUrlRegex . "$/", $strUrl, $matches))
    {
      echo "<br> matches";
       print_r($matches);
      for ($i = 0; $i < count(self::$tmp); $i++)
      {
        $UrlArray[self::$tmp[$i]] = $matches[$i + 1];
      }

      self::$tmp = array();
     
      return $UrlArray;
    }
    self::$tmp = array();
    return false;
  }*/



//alternative function
  public function match($route, $url)
  {
    if (strpos($route, '{') === FALSE)
    {
      if (strcmp($route, $url) == 0)
      {
        return TRUE;
      }
      return FALSE;
    }

    $vars = [];
    $umatches = [];
    //get all parameters in curly braces in $route
    preg_match_all('/\{(.*?)\}/', $route, $matches); 

    //get the string before first occurrence of { in $route
    preg_match('/(.*?)\{/', $route, $amatches);  
    //get all strings between } and { in $route               
    preg_match_all('/\}(.*?)\{/', $route, $bmatches);     
    
    //get the string after last }
    if (!empty($bmatches[1])){                  
      $a = preg_split(end($bmatches[1]) , $route);
      $b = preg_split('/\}(.*?)/', end($a));
    }
    else{
      $a = preg_split('/' . str_replace('/', '\/', end($amatches)) . '/', $route);
      $b = preg_split('/\}(.*?)/', end($a));
    }

    //push the matches into array $umatches
    if (!empty($amatches[1])) array_push($umatches, $amatches[1]);
    if (!empty($bmatches[1]))
    {
      foreach($bmatches[1] as $key => $value)
      {
        array_push($umatches, $value);
      }
    }
    if (!empty($b[1])) array_push($umatches, $b[1]);

    //check if the $url matches with $route template
    $prev = - 1;
    foreach($umatches as $key => $value)
    {
      $pos = strpos($url, $value);
      if ($pos !== FALSE)
      {
        if ($prev > $pos) return FALSE;
        $prev = $pos;
      }
      else return FALSE;
    }

    //push the parameter values in $url into $vars array
    $i = 0;
    foreach($umatches as $key => $value)
    {
      $value = str_replace('/', '\/', $value);
      $value = '/' . $value . '/';
      $r = preg_split($value, $url);
      $url = $r[1];

      if (!empty($r[0])) array_push($vars, $r[0]);
      $i++;
    }
    if (!empty($r[1])) array_push($vars, $r[1]);

    //map the values in $url with the parameters in $route template
    $params = [];
    for ($i = 0; $i < sizeof($matches[1]); $i++)
    {
      $params[$matches[1][$i]] = $vars[$i];
    }

    return $params;
  }
}
