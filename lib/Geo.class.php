<?php

class Lib_Geo {

	const EARTH_RADIUS = 6370996.81;
	//计算地理距离
	public static function getDistance($lat1,$lng1,$lat2,$lng2){
		//将角度转为狐度
		$rLat1=deg2rad($lat1);//deg2rad()函数将角度转换为弧度
		$rLat2=deg2rad($lat2);
		$rLng1=deg2rad($lng1);
		$rLng2=deg2rad($lng2);
		$a=$rLat1-$rLat2;
		$b=$rLng1-$rLng2;
		$s=2*asin(sqrt(pow(sin($a/2),2)+cos($rLat1)*cos($rLat2)*pow(sin($b/2),2)))*self::EARTH_RADIUS;
		return $s;
	}

	//构造sql类型
	public function buildInDistanceSql($lat, $lon,$distance, $latField = 'lat', $lonField = 'lon'){
		$lat1 = $lat;
		$lon1 = $lon;
		$lat2 = $latField;
		$lon2 = $lonField;
		$formula = self::EARTH_RADIUS."*ACOS(COS({$lat1}*PI()/180) * COS({$lat2}*PI()/180) * COS({$lon1}*PI()/180 - {$lon2}*PI()/180) + SIN({$lat1}*PI()/180) * SIN({$lat2}*PI()/180))";
		$sql = '('.$formula.')<= '.$distance;
		return $sql;

	}

	//服务距离的sql
	public function buildSrvDistanceSql($lat, $lon,$distField='srvdistance', $latField = 'lat', $lonField = 'lon'){
		$lat1 = $lat;
		$lon1 = $lon;
		$lat2 = $latField;
		$lon2 = $lonField;
		$formula = self::EARTH_RADIUS."*ACOS(COS({$lat1}*PI()/180) * COS({$lat2}*PI()/180) * COS({$lon1}*PI()/180 - {$lon2}*PI()/180) + SIN({$lat1}*PI()/180) * SIN({$lat2}*PI()/180))";
		$sql = '('.$formula.')<= `'.$distField.'`';
		return $sql;

	}




}


?>