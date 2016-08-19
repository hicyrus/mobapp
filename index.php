<?php

define("APP_ROOT",dirname(__FILE__).DIRECTORY_SEPARATOR);
define("CONF_PATH",APP_ROOT."conf".DIRECTORY_SEPARATOR);
define("MO_PATH",APP_ROOT."mo".DIRECTORY_SEPARATOR);
define("LIB_PATH",APP_ROOT."lib".DIRECTORY_SEPARATOR);
define("EXT_PATH",APP_ROOT."ext".DIRECTORY_SEPARATOR);
echo APP_ROOT.PHP_EOL;
echo CONF_PATH.PHP_EOL;
echo MO_PATH.PHP_EOL;
echo LIB_PATH.PHP_EOL;
echo EXT_PATH.PHP_EOL;


//自动加载
function __autoload($className){
	echo "a:".$className.PHP_EOL;
	$nameArr = explode("_", $className);
	$nameLen = count($nameArr);
	if($nameLen>1){
		$classPath= APP_ROOT;
		for($i=0;$i<$nameLen-1;$i++){
			$classPath .= strtolower($nameArr[$i]).DIRECTORY_SEPARATOR;
		}
		$classPath .= $nameArr[$nameLen-1].".class.php";
		if(file_exists($classPath)){
			require_once($classPath);
		}else
			echo $classPath;
			
	}

}

$a = new Lib_A();

$redis = new Lib_Redis();
echo PHP_EOL;
$g = [31.2014966,121.40233369999998,31.22323799999999,121.44552099999998];

echo Lib_Geo::getDistance($g[0],$g[1],$g[2],$g[3]).PHP_EOL;


?>
