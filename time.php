<?php
class LocalDateTime {
    private static $timeZone = array(
                            "ar"=>"Africa/Cairo",
                            "br"=>"Brazil/Acre",
                            "th"=>"Asia/Bangkok",
                            "jp"=>"Asia/Tokyo",
                            "id"=>"Asia/Jakarta",
                        );

    /**
     * @TODO 获取当地时间戳
     * $country 国家
     * $timeStamp 时间戳
     * return $timeStamp 经过夏令时转化的时间戳
     */
    public static function getZoneTimeStamp($country, $timeStamp=false) {
        if (!isset(self::$timeZone[$country])) {
            return false;
        }

        $nowTimeZone=date('e');//时间时区标示
        $timeZone = self::$timeZone[$country];
        date_default_timezone_set($timeZone); //设定时区
        if (empty($timeStamp)) {
            $timeStamp = time(); 
           // echo $timeStamp . "\n" ;      
        }

        $dst=date('I'); //日期是否存在夏令时
        if ($dst) {
            $timeStamp-= 3600;
        }

        date_default_timezone_set($nowTimeZone);
        echo $nowTimeZone . "\n";
        return $timeStamp;
    }

    /**
     * @TODO 根据时区格式化时间
     * $country 国家
     * $timeStamp 时间戳
     * $format 格式化结构
     * return $date 返回格式化后时间
     */
    public static function formatZoneTime($country, $timeStamp=false, $format) {
        if (!isset(self::$timeZone[$country])) {
            return false;
        }

        $nowTimeZone=date('e');
        $timeZone = self::$timeZone[$country];
        date_default_timezone_set($timeZone); 
        if (empty($timeStamp)) {
            $timeStamp = time();       
        }

        $dst=date('I'); 
        if ($dst) {
            $timeStamp-= 3600;
        }
        $timeDate = date($format, $timeStamp);

        date_default_timezone_set($nowTimeZone);

        return $timeDate;
    }
}
?>
