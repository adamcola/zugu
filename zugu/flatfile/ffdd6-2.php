<?php
/*
MAKE SURE YOU HAVE THE FIRST PAGE OF HTML TOO.
THE FORM ON IT CALLS THIS 2ND PAGE.
WITHOUT IT THE DEMO WON'T WORK!
*/

$limit = 10; // how many search finds to show
$buttons = 5; // how many buttons to show
$hide = 0;
$showpages = 'no';

$myurl = 'http://www.designdetector.com/';

$search = $_POST['search'];
$search = str_replace('|','',$search); //remove pipe delimiter as database uses it
$search = str_replace('\"','"',$search); //fix difference between PHP4 and 5!
$search = strip_tags($search); //remove HTML tags
//remove spaces before or after a word:
$search = rtrim($search);
$search = ltrim($search);

//remove multiple spaces:
while ((substr_count($search,'  ') >= 1)) {
  $search = str_replace('  ',' ',$search);
}

//remove multiple speech marks:
while ((substr_count($search,'""') >= 1)) {
  $search = str_replace('""','"',$search);
}

//remove speech marks on start or end only
if (($search[0] == '"') and ($search[(strlen($search) - 1)] <> '"') or ($search[0] <> '"') and ($search[(strlen($search) - 1)] == '"')) {
    $search = str_replace('"','',$search);
}

//define globals so they can be returned by functions
$GLOBALS['highlight1'] = '<span class="found">';
$GLOBALS['highlight2'] = '</span>';
$GLOBALS['result'] = '';
$GLOBALS['theurl'] = '';
$GLOBALS['thedate'] = '';

function highlight($thefield,$thefieldlow,$thesearch) {
  $fieldlength = strlen($thefield);
  $searchlength = strlen($thesearch);
  $pos = strpos($thefield, $thesearch);
  $stringend = $searchlength + $pos;
  $slice1 = substr($thefield, 0, $pos);
  $slice2 = substr($thefield, $pos, $searchlength);
  $slice3 = substr($thefield, $stringend);
  $GLOBALS['result'] = $slice1.$GLOBALS['highlight1'].$slice2.$GLOBALS['highlight2'].$slice3; //rebuild text with highlight
}

function getdetails($myurl,$folder,$demo_path,$demo_name,$demo_day,$demo_month,$demo_year) {
  $filetype_check = substr($demo_path,-4);
  if ($filetype_check <> '.php') {
    $filetype = '.html';
  }
  if ($demo_name == 'Using Images To Show Link States') {$filetype = '.html#using';}
  switch ($folder) {
    case '': $folder = 'demos/'; break;
    case 'r': $folder = 'archives/'; break;
    case 'b': $folder = 'bugs/'; break;
    case 't': $folder = 'tips/'; break;
    case 'a': $folder = 'articles/'; break;
    case 'l': $folder = 'testlab/';
  }
  if ($demo_day <> '') {
    $GLOBALS['thedate'] = date('jS F Y', mktime(0,0,0,$demo_month,$demo_day,($demo_year + 2000)));
  } else {
    $GLOBALS['thedate'] = 'Unknown date';
  }
  $GLOBALS['theurl'] = $myurl.$folder.$demo_path.$filetype;
}



$title = 'Flat File Database Demo 6';

echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title>$title</title>

<link rel="stylesheet" href="ffdd6.css" type="text/css" media="screen, projection" title="Default">

<script>
function page(pageno,pagecount) {
  var x = document.styleSheets[0];
  x.deleteRule(x.cssRules.length-1); // delete show page 1 css (.hide0)
  x.deleteRule(x.cssRules.length-1); // delete highlight page 1 css (#page1)
  // x.removeRule(x.rules.length-1); // for IE8 or less (can't use as apparently it will also affect Safari & Chrome)
  // x.removeRule(x.rules.length-1); // for IE8 or less

  var rule2 = '.hide' + (pageno - 1) + ' {display:block!important}';
  x.insertRule(rule2,x.cssRules.length); // add css to show page chosen (.hide?)
  // x.addRule('.hide' + (pageno - 1), 'display:block!important'); // for IE8 or less

  var rule4 = '#page' + (pageno) + ' {padding:4px 10px!important; border-radius:50px}';
  x.insertRule(rule4,x.cssRules.length); // highlight page chosen button (#page?)
  // x.addRule('#page' + (pageno), 'padding:4px 10px!important; border-radius:50px'); // for IE8 or less
}

function page1(pagecount) {
  var x = document.styleSheets[0];
  x.deleteRule(x.cssRules.length-1); // delete show page > 1 css (.hide?)
  x.deleteRule(x.cssRules.length-1); // delete highlight page > 1 css (#page?)
  // x.removeRule(x.rules.length-1); // for IE8 or less
  // x.removeRule(x.rules.length-1); // for IE8 or less

  var rule2 = '.hide0 {display:block!important}';
  x.insertRule(rule2,x.cssRules.length); // add css to show page 1 (.hide0)
  // x.addRule('.hide0', 'display:block!important'); // for IE8 or less

  var rule4 = '#page1 {padding:4px 10px!important; border-radius:50px}';
  x.insertRule(rule4,x.cssRules.length); // highlight page 1 button (#page1)
  // x.addRule('page1', 'padding:4px 10px!important; border-radius:50px'); // for IE8 or less
}

/*
function next(pinkfloyd,pagecount) {
  alert(pinkfloyd + ',' + pagecount);
  var x = document.styleSheets[0];
  x.deleteRule(x.cssRules.length-1);
}
*/

</script>


</head>

<body>

<h1>$title</h1>

HTML;


if (($search == '') or ($search == '"')) {exit('No usable search string found!');}

$fp = fopen('../databases/demos.txt','r');
if (!$fp) {exit('<p><b>ERROR: Unable to open database file!</b></p></body></html>');}

$row = 0;

while (!feof($fp)) {
	$col[$row] = fgets($fp,1024); //use 2048 if very long lines
	$row++;
}

fclose($fp);

//Avoid sort below if you have numbers at the start of each line!
//It puts all the lines beginning with 1 first, eg: 1, 10, 11, 12 etc.
//sort($col);
reset($col);

$arrays = count($col) - 1;

$GLOBALS['finds'] = '';
$loop = -1;
$and = $once = $found = $found1 = $found2 = $bothfound = $search2also = 'no';
$count = 0;
$speechmarks = '';

//test for AND but not two words that must be together (""):
if ((strstr($search,' AND ')) and ($search[0] <> '"')) {
  $and = 'yes';
  list ($word1, $word2, $word3) = explode (' ', $search); //remove AND
  $word1 = strtolower($word1);
  $word3 = strtolower($word3);
  if ($word1 == $word3) {
    $search = $word1;
    $and = 'no';
  } else {
      $search1 = $word1;
      $search2 = $word3;
      while ($loop < $arrays) {
      $loop++;
      list($folder,$demo_path,$demo_name,$demo_notes,$demo_day,$demo_month,$demo_year) = explode('|',$col[$loop]);
      $field = $demo_name.'|'.$demo_notes; //preserve original text
      $fieldlow = strtolower($field);
      if ((strstr($fieldlow,$search1)) and (strstr($fieldlow,$search2))) {
        $found = $found1 = $found2 = $bothfound = 'yes';
        
        getdetails($myurl,$folder,$demo_path,$demo_name,$demo_day,$demo_month,$demo_year);

        //word1
        highlight($fieldlow,$field,$search1);
        //word2
        $fieldlow = strtolower($GLOBALS['result']); //update field to include highlighted version from above
        highlight($fieldlow,$GLOBALS['result'],$search2);
        list($highlighted,$highlighted2) = explode('|',$GLOBALS['result']);
        
        if ($count >= $limit) {
          $hide = floor($count / $limit);
          $showpages = 'yes';
        }

        $GLOBALS['finds'].='
<li class="hide'.$hide.'"><a href="'.$theurl.'">'.$highlighted.'</a> '.$highlighted2.' &middot; <span class="date">'.$thedate.'</span></li>
';
      $count++;
      }
    }
  }
}


if (($and == 'no') and ($bothfound == 'no')) {

$search = strtolower($search);

$search1 = $search2 = '';
if (strstr($search,' ')) {
  list ($search1, $search2) = explode (' ', $search);
  if ($search2 == $search1) {//when both words are the same
    $search = $search1; //make search just first word
    $search1 = $search2 = ''; //destroy both words from split
  }
}

//test for space in search but not two words that must be together (""):
if ((strstr($search,' ')) and ($search[0] <> '"')) {
  list ($search1, $search2) = explode (' ', $search);
  //search for two separate words
  while ($loop < $arrays) {
    $loop++;
    $search2also = 'no';
      list($folder,$demo_path,$demo_name,$demo_notes,$demo_day,$demo_month,$demo_year) = explode('|',$col[$loop]);
      $field = $demo_name.'|'.$demo_notes; //preserve original text
      $fieldlow = strtolower($field);
      $fieldkept = $fieldlow; //preserve text without web code
		if (strstr($fieldlow,$search1)) {
      if (strstr($fieldlow,$search2)) {$search2also = $bothfound = 'yes';}
			$found = $found1 = 'yes';

      getdetails($myurl,$folder,$demo_path,$demo_name,$demo_day,$demo_month,$demo_year);

      highlight($fieldlow,$field,$search1);
      if ($search2also <> 'yes') { //only output once when both words on same row
        list($highlighted,$highlighted2) = explode('|',$GLOBALS['result']);
        if ($count >= $limit) {
          $hide = floor($count / $limit);
          $showpages = 'yes';
        }

        $GLOBALS['finds'].='
<li class="hide'.$hide.'"><a href="'.$theurl.'">'.$highlighted.'</a> '.$highlighted2.' &middot; <span class="date">'.$thedate.'</span></li>
';
        $count++;
      }
		}
    if (strstr($fieldkept,$search2)) { //search on line without highlighting added
      $found = $found2 = 'yes';

      getdetails($myurl,$folder,$demo_path,$demo_name,$demo_day,$demo_month,$demo_year);

      highlight($fieldlow,$GLOBALS['result'],$search2);
      if (($search2also == 'yes') or ($found2 == 'yes')) {
        list($highlighted,$highlighted2) = explode('|',$GLOBALS['result']);

        if ($count >= $limit) {
          $hide = floor($count / $limit);
          $showpages = 'yes';
        }

        $GLOBALS['finds'].='
<li class="hide'.$hide.'"><a href="'.$theurl.'">'.$highlighted.'</a> '.$highlighted2.' &middot; <span class="date">'.$thedate.'</span></li>
';
        $count++;
      }
		}
  }
} else {
  //check if speech marks and remove them:
  if ($search[0] == '"') {
    $search = str_replace('"','',$search);
    $speechmarks = '\''; //for output later
  }

  if ($search <> '') {
    //do normal search
    while ($loop < $arrays) {
      $loop++;
      list($folder,$demo_path,$demo_name,$demo_notes,$demo_day,$demo_month,$demo_year) = explode('|',$col[$loop]);
      $field = $demo_name.'|'.$demo_notes; //preserve original text
      $fieldlow = strtolower($field);
      if (strstr($fieldlow,$search)) {
        $found = $found1 = 'yes';

        getdetails($myurl,$folder,$demo_path,$demo_name,$demo_day,$demo_month,$demo_year);

        highlight($fieldlow,$field,$search);
        list($highlighted,$highlighted2) = explode('|',$GLOBALS['result']);

        if ($count >= $limit) {
          $hide = floor($count / $limit);
          $showpages = 'yes';
        }

        $GLOBALS['finds'].='
<li class="hide'.$hide.'"><a href="'.$GLOBALS['theurl'].'">'.$highlighted.'</a> '.$highlighted2.' &middot; <span class="date">'.$GLOBALS['thedate'].'</span></li>
';
      $count++;
      }
    }
  } else {exit('No usable search string found!');}
}

} //if ($and == 'no')


if ($found == 'yes') {
  if ($count > 1) {
    $plural = 's';
  } else {
    $plural = '';
  }
  echo '

<p id="foundtext"><b>\''.$speechmarks.$search.$speechmarks.'\'</b> found '.$count.' demo'.$plural.':</p>

<ol id="finds">
'.$GLOBALS['finds'].'
</ol>';

if ($showpages == 'yes') {
  $pagecount = ceil($count / $limit);
  echo '
  
<p id="pages">Page: <a id="page1" href="#" onclick="page1('.$pagecount.')">1</a>';
  $pinkfloyd = 1;
  while ($pinkfloyd < $pagecount) {
    $pinkfloyd++;
//    if ($pinkfloyd > $buttons) {echo ' <a id="next" href="#" onclick="next('.$pinkfloyd.','.$pagecount.');" style="display:inline">Next '.$buttons.' &gt;</a> <a id="previous" href="#" onclick="previous('.$pagecount.','.$pagecount.');">&lt; Previous '.$buttons.'</a> <a id="page'.$pagecount.'" href="#" onclick="page('.$pagecount.','.$pagecount.');">Last ('.$pagecount.')</a>'; break;}
    
    echo ' <a id="page'.$pinkfloyd.'" href="#" onclick="page('.$pinkfloyd.','.$pagecount.');">'.$pinkfloyd.'</a>';
  }
  echo '</p>';
}

} else {
  echo '<p><b>\''.$speechmarks.$search.$speechmarks.'\'</b> was not found.</p>';
}

echo '

<p>
<br>By <a href="'.$myurl.'">Chris Hester</a> 7th February 2012 | Updated: '.date('jS F Y', getlastmod()).' | <a href="'.$myurl.'2012/02/flat-file-database-demo-6.php">About The Demo</a> | <a href="'.$myurl.'2012/02/flat-file-database-demo-6.php#comments">Comments</a></p>

<!-- if javascript off, just show all the links on one page -->
<noscript><style>#pages {display:none} ol#finds li {display:block}</style></noscript>

</body>
</html>';
?>