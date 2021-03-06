<?php

/*
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    'year' => ':count год|:count года|:count лет',
    'y' => ':count г|:count г|:count л',
    'month' => ':count месяц|:count месяца|:count месяцев',
    'm' => ':count м|:count м|:count м',
    'week' => ':count неделю|:count недели|:count недель',
    'w' => ':count н|:count н|:count н',
    'day' => ':count день|:count дня|:count дней',
    'd' => ':count д|:count д|:count д',
    'hour' => ':count час|:count часа|:count часов',
    'h' => ':count ч|:count ч|:count ч',
    'minute' => ':count минуту|:count минуты|:count минут',
    'min' => ':count мин|:count мин|:count мин',
    'second' => ':count секунду|:count секунды|:count секунд',
    's' => ':count с|:count с|:count с',
    'ago' => ':time назад',
    'from_now' => 'через :time',
    'after' => ':time после',
    'before' => ':time до',
    'formats' => [
        'LT' => 'H:mm',
        'LTS' => 'H:mm:ss',
        'L' => 'DD.MM.YYYY',
        'LL' => 'D MMMM YYYY г.',
        'LLL' => 'D MMMM YYYY г., H:mm',
        'LLLL' => 'dddd, D MMMM YYYY г., H:mm',
    ],
    'calendar' => [
        'sameDay' => '[Сегодня, в] LT',
        'nextDay' => '[Завтра, в] LT',
        'nextWeek' => function (\Carbon\CarbonInterface $current, \Carbon\CarbonInterface $other) {
            if ($current->week !== $other->week) {
                switch ($current->dayOfWeek) {
                    case 0:
                        return '[В следующее] dddd, [в] LT';
                    case 1:
                    case 2:
                    case 4:
                        return '[В следующий] dddd, [в] LT';
                    case 3:
                    case 5:
                    case 6:
                        return '[В следующую] dddd, [в] LT';
                }
            }

            if ($current->dayOfWeek === 2) {
                return '[Во] dddd, [в] LT';
            }

            return '[В] dddd, [в] LT';
        },
        'lastDay' => '[Вчера, в] LT',
        'lastWeek' => function (\Carbon\CarbonInterface $current, \Carbon\CarbonInterface $other) {
            if ($current->week !== $other->week) {
                switch ($current->dayOfWeek) {
                    case 0:
                        return '[В прошлое] dddd, [в] LT';
                    case 1:
                    case 2:
                    case 4:
                        return '[В прошлый] dddd, [в] LT';
                    case 3:
                    case 5:
                    case 6:
                        return '[В прошлую] dddd, [в] LT';
                }
            }

            if ($current->dayOfWeek === 2) {
                return '[Во] dddd, [в] LT';
            }

            return '[В] dddd, [в] LT';
        },
        'sameElse' => 'L',
    ],
    'ordinal' => function ($number, $period) {
        switch ($period) {
            case 'M':
            case 'd':
            case 'DDD':
                return $number.'-й';
            case 'D':
                return $number.'-го';
            case 'w':
            case 'W':
                return $number.'-я';
            default:
                return $number;
        }
    },
    'meridiem' => function ($hour, $minute, $isLower) {
        if ($hour < 4) {
            return 'ночи';
        }
        if ($hour < 12) {
            return 'утра';
        }
        if ($hour < 17) {
            return 'дня';
        }

        return 'вечера';
    },
    'months' => ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'],
    'months_standalone' => ['январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'],
    'months_short' => ['янв.', 'февр.', 'мар.', 'апр.', 'мая', 'июня', 'июля', 'авг.', 'сент.', 'окт.', 'нояб.', 'дек.'],
    'months_short_standalone' => ['янв.', 'февр.', 'март', 'апр.', 'май', 'июнь', 'июль', 'авг.', 'сент.', 'окт.', 'нояб.', 'дек.'],
    'months_regexp' => '/D[oD]?(\[[^\[\]]*\]|\s)+MMMM?/',
    'weekdays' => ['воскресенье', 'понедельник', 'вторник', 'среду', 'четверг', 'пятницу', 'субботу'],
    'weekdays_standalone' => ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
    'weekdays_short' => ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'],
    'weekdays_min' => ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'],
    'weekdays_regexp' => '/\[\s*(В|в)\s*((?:прошлую|следующую|эту)\s*)?\]\s*dddd/',
    'first_day_of_week' => 1,
    'day_of_first_week_of_year' => 4,
];
