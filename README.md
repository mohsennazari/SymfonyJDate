# Symfony JalaliDateTime
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/16d6b63a-1f25-413d-9b92-f7b823027102/mini.png)](https://insight.sensiolabs.com/projects/16d6b63a-1f25-413d-9b92-f7b823027102)[![License](https://poser.pugx.org/symfony_persia/symfonyjdate/license.svg)](https://packagist.org/packages/symfony_persia/symfonyjdate)

Symfony Bundle for converting dates from Gregorian calendar system to Jalali calendar system and vice versa. Supports dates beyond 2038.  
Jalali, also known as Shamsi or Hijri Shamsi is the Iranian calendar system. It uses [Salar Kaboli's jDateTime class](https://github.com/sallar/jDateTime) for the conversion. 

#Requirements

jDateTime Requires **PHP >= 5.2**  

#Installation

Add these line to your composer.json and update:

```
"require": {
	"mdhheydari/symfonyjdate": "dev-master"
}
```

#Examples

There is two ways to use this bundle:

##1. As a Twig filter (recommended)

Simply you can filter any variable containing a date, datetime, interval or date string:
```
{{ entity.date|jdate }}
```

Also it's possible to chose the format:
```
{{ entity.date|jdate('Y-m-d') }}
```

##2. As a service

Not recommanded, Maybe neccessary in some situations though.

Example:
```
$jDate = $serviceContainer->get('symfony_persia.jdate');
```

#Contributors:
- [MohammadHossein Heydari](https://github.com/mdhheydari)
- [Sallar Kaboli](http://sallar.me)  
- [Omid Pilevar](http://pilevar.ir)
- [Afshin Mehrabani](http://afshinm.name)  
- [Amir Latifi](http://amiir.me)
- [Ruhollah Namjoo](https://github.com/namjoo)

##License
Symfony JalaliDate Bundle was created by [MohammadHossein Heydari](https://github.com/mdhheydari) and released under the [MIT License](http://opensource.org/licenses/mit-license.php).

Copyright (C) 2015 [MohammadHossein Heydari](https://github.com/mdhheydari)

jDateTime was created by [Sallar Kaboli](http://sallar.me) and released under the [MIT License](http://opensource.org/licenses/mit-license.php).

Copyright (C) 2015 [Sallar Kaboli](http://sallar.me)  
Part of Phoenix Framework (p5x.org) by [Phoenix Alternatvie](http://p5x.org)
  
Original Jalali to Gregorian (and vice versa) convertor:  
Copyright (C) 2000  Roozbeh Pournader and Mohammad Toossi

    The MIT License (MIT)
    
    Copyright (C) 2015      MohammadHossein Heydari
    Copyright (C) 2003-2015 Sallar Kaboli

    Permission is hereby granted, free of charge, to any person obtaining a
    copy of this software and associated documentation files (the "Software"),
    to deal in the Software without restriction, including without limitation
    the rights to use, copy, modify, merge, publish, distribute, sublicense,
    and/or sell copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following conditions:

    1- The above copyright notice and this permission notice shall be included
    in all copies or substantial portions of the Software.
    
    2- THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
    OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
    DEALINGS IN THE SOFTWARE.

#Resources
- [List of supported timezones](http://www.php.net/manual/en/timezones.php)  
- [Documentation and Instructions in Persian](http://sallar.me/projects/jdatetime)  
- [Project page in phpclasses.org](http://www.phpclasses.org/jdatetime)   
