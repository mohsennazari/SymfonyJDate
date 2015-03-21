<?php

namespace SymfonyPersia\JalaliDateBundle\Service;

use SymfonyPersia\JalaliDateBundle\lib\JDateTime;

/**
 * Jalali DateTime Service
 * It uses JDateTime class by Sallar Kaboli.
 *
 * @author    MohammadHossein Heydari <mdh.heydari@gmail.com>
 * @copyright 2015 MohammadHossein Heydari
 * @license   http://opensource.org/licenses/mit-license.php The MIT License
 * @link      http://sallar.me/projects/jdatetime/
 * @see       DateTime
 */
class JalaliDateTime {
    /**
     * @var jDateTime 
     */
    private $jDate;

    public function __construct(jDateTime $jDate) {
        $this->jDate = $jDate;
    }

    /**
     * jDateTime::Date
     *
     * Formats and returns given timestamp just like php's
     * built in date() function.
     * e.g:
     * $obj->date("Y-m-d H:i", time());
     * $obj->date("Y-m-d", time(), false, false, 'America/New_York');
     *
     * @author MohammadHossein Heydari
     * @param $format string Acceps format string based on: php.net/date
     * @param $stamp int Unix Timestamp (Epoch Time)
     * @param $convert bool (Optional) forces convert action. pass null to use system default
     * @param $jalali bool (Optional) forces jalali conversion. pass null to use system default
     * @param $timezone string (Optional) forces a different timezone. pass null to use system default
     * @return string Formatted input
     */
    public function date($format, $stamp = false, $convert = null, $jalali = null, $timezone = null)
    {
        return $this->jDate->date($format, $stamp, $convert, $jalali, $timezone);
    }

    /**
     * jDateTime::gDate
     *
     * Same as jDateTime::Date method
     * but this one works as a helper and returns Gregorian Date
     * in case someone doesn't like to pass all those false arguments
     * to Date method.
     *
     * e.g. $obj->gDate("Y-m-d") //Outputs: 2011-05-05
     *      $obj->date("Y-m-d", false, false, false); //Outputs: 2011-05-05
     *      Both return the exact same result.
     *
     * @author MohammadHossein Heydari
     * @param $format string Acceps format string based on: php.net/date
     * @param $stamp int Unix Timestamp (Epoch Time)
     * @param $timezone string (Optional) forces a different timezone. pass null to use system default
     * @return string Formatted input
     */
    public function gDate($format, $stamp = false, $timezone = null)
    {
        return $this->jDate->gDate($format, $stamp, false, false, $timezone);
    }

    /**
     * jDateTime::Strftime
     *
     * Format a local time/date according to locale settings
     * built in strftime() function.
     * e.g:
     * $obj->strftime("%x %H", time());
     * $obj->strftime("%H", time(), false, false, 'America/New_York');
     *
     * @author MohammadHossein Heydari
     * @param $format string Acceps format string based on: php.net/date
     * @param $stamp int Unix Timestamp (Epoch Time)
     * @param $convert bool (Optional) forces convert action. pass null to use system default
     * @param $jalali bool (Optional) forces jalali conversion. pass null to use system default
     * @param $timezone string (Optional) forces a different timezone. pass null to use system default
     * @return string Formatted input
     */
    public function strftime($format, $stamp = false, $convert = null, $jalali = null, $timezone = null)
    {
        return $this->jDate($format, $stamp, $convert, $jalali, $timezone); 
    }

   /**
     * jDateTime::Mktime
     *
     * Creates a Unix Timestamp (Epoch Time) based on given parameters
     * works like php's built in mktime() function.
     * e.g:
     * $time = $obj->mktime(0,0,0,2,10,1368);
     * $obj->date("Y-m-d", $time); //Format and Display
     * $obj->date("Y-m-d", $time, false, false); //Display in Gregorian !
     *
     * You can force gregorian mktime if system default is jalali and you
     * need to create a timestamp based on gregorian date
     * $time2 = $obj->mktime(0,0,0,12,23,1989, false);
     *
     * @author MohammadHossein Heydari
     * @param $hour int Hour based on 24 hour system
     * @param $minute int Minutes
     * @param $second int Seconds
     * @param $month int Month Number
     * @param $day int Day Number
     * @param $year int Four-digit Year number eg. 1390
     * @param $jalali bool (Optional) pass false if you want to input gregorian time
     * @param $timezone string (Optional) acceps an optional timezone if you want one
     * @return int Unix Timestamp (Epoch Time)
     */
    public function mktime($hour, $minute, $second, $month, $day, $year, $jalali = null, $timezone = null)
    {
        return $this->jDate->mktime($hour, $minute, $second, $month, $day, $year, $jalali, $timezone);
    }

    /**
     * jDateTime::Checkdate
     *
     * Checks the validity of the date formed by the arguments.
     * A date is considered valid if each parameter is properly defined.
     * works like php's built in checkdate() function.
     * Leap years are taken into consideration.
     * e.g:
     * $obj->checkdate(10, 21, 1390); // Return true
     * $obj->checkdate(9, 31, 1390);  // Return false
     *
     * You can force gregorian checkdate if system default is jalali and you
     * need to check based on gregorian date
     * $check = $obj->checkdate(12, 31, 2011, false);
     *
     * @author MohammadHossein Heydari
     * @param $month int The month is between 1 and 12 inclusive.
     * @param $day int The day is within the allowed number of days for the given month.
     * @param $year int The year is between 1 and 32767 inclusive.
     * @param $jalali bool (Optional) pass false if you want to input gregorian time
     * @return bool
     */
    public function checkdate($month, $day, $year, $jalali = null)
    {
        return $this->jDate->checkdate($month, $day, $year, $jalali);
    }

    /**
     * Converts a gregorian date to jalali
     *
     * @author MohammadHossein Heydari
     * @param $g_y Gregorian year
     * @param $g_m Gregorian month
     * @param $g_d Gregorian day
     * @return array Jalali date
     */
    public function toJalali($g_y, $g_m, $g_d) {
        return $this->jDate->toJalali($g_y, $g_m, $g_d);
    }

    /**
     * Converts a jalali date to gregorian
     *
     * @author MohammadHossein Heydari
     * @param $j_y Jalali year
     * @param $j_m Jalali month
     * @param $j_d Jalali day
     * @return array Gregorian date
     */
    public function toGregorian($j_y, $j_m, $j_d) {
        return $this->jDate->toGregorian($j_y, $j_m, $j_d);
    }
}
