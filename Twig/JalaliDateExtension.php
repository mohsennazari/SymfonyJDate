<?php

namespace SymfonyPersia\JalaliDateBundle\Twig;

use SymfonyPersia\JalaliDateBundle\lib\jDateTime;

class JalaliDateExtension extends \Twig_Extension
{
    const DEFAULT_INTERVAL_FORMAT = '%d روز';
    const DEFAULT_DATE_FORMAT = 'l, d M Y H:i:s O';

    /**
     * Instance of jDateTime service
     * @var jDateTime 
     */
    private $jDate;

    public function __construct(jDateTime $jDate) {
        $this->jDate = $jDate;
    } 

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('jdate', array($this, 'jDateFilter')),
        );
    }

    public function jDateFilter($date, $format = null, $timezone = null) {
        if (null === $format) {
            $format = $date instanceof \DateInterval ? self::DEFAULT_INTERVAL_FORMAT : self::DEFAULT_DATE_FORMAT;
        }

        if ($date instanceof \DateInterval) {
            return $date->format($format);
        }

        return $this->jDateConverter($date, $format, $timezone);
    }

    public function jDateConverter($date, $format, $timezone) {
        if (false !== $timezone) {
            if (null === $timezone) {
                $timezone = new \DateTimeZone(date_default_timezone_get());
            } elseif (!$timezone instanceof \DateTimeZone) {
                $timezone = new \DateTimeZone($timezone);
            }
        }

        if ($date instanceof \DateTimeImmutable) {
            if (false !== $timezone) {
                $date->setTimezone($timezone);
            }
            return $this->jDate->date($format, $date->getTimestamp(), true, true);
        }

        if ($date instanceof \DateTime || $date instanceof \DateTimeInterface) {
            $date = clone $date;
            if (false !== $timezone) {
                $date->setTimezone($timezone);
            }

            return $this->jDate->date($format, $date->getTimestamp(), true, true);
        }

        if (ctype_digit($asString) || (!empty($asString) && '-' === $asString[0] && ctype_digit(substr($asString, 1)))) {
            $date = '@'.$date;
        }

        $date = new \DateTime($date, $env->getExtension('core')->getTimezone());
        if (false !== $timezone) {
            $date->setTimezone($timezone);
        }

        return $this->jDate->date($format, $date->getTimestamp(), true, true);
    }

    public function getName() {
        return 'symfony_persia.jdate_extension';
    }
}
