<?php
declare(strict_types=1);

echo "Задание 1 <br/>" . PHP_EOL;
echo "<br/>" . PHP_EOL;

function add(float | int $arg1, float | int $arg2) : float | int
{
    return $arg1 + $arg2;
}

function subtract(float | int $arg1, float | int $arg2) : float | int
{
    return $arg1 - $arg2;
}

function multiply(float | int $arg1, float | int $arg2) : float | int
{
    return $arg1 * $arg2;
}

function divide(float | int $arg1, float | int $arg2) : float | int | string
{
    return ($arg2 != 0) ? $arg1 / $arg2 : "Error: Division by zero ";
}

// Пример использования функций

echo "5 + 3 = " . add(5, 3) . " <br/>" . PHP_EOL;  // Выведет 8
echo "5 - 3 = " . subtract(5, 3) . " <br/>" . PHP_EOL;  // Выведет 2
echo "5 * 3 = " . multiply(5, 3) . " <br/>" . PHP_EOL;  // Выведет 15
echo "6 / 2 = " . divide(6, 2) . " <br/>" . PHP_EOL;  // Выведет 3
echo "6 / 0 = " . divide(6, 0) . " <br/>" . PHP_EOL;  // Выведет "Error: Division by zero"

echo "<br/>" . PHP_EOL;
echo "Задание 2 <br/>" . PHP_EOL;
echo "<br/>" . PHP_EOL;

function mathOperation(float | int $arg1, float | int $arg2, string $operation) : float | int | string
{
    switch ($operation) {
        case 'add':
            return add($arg1, $arg2);
        case 'subtract':
            return subtract($arg1, $arg2);
        case 'multiply':
            return multiply($arg1, $arg2);
        case 'divide':
            return divide($arg1, $arg2);
        default:
            return "Error: Unsupported operation";
    }
}

// Пример использования
echo mathOperation(5, 3, 'add') . " <br/>" . PHP_EOL;;   // Вернет 2
echo mathOperation(5, 3, 'multiply') . " <br/>" . PHP_EOL;;  // Вернет 15
echo mathOperation(6, 2, 'divide') . " <br/>" . PHP_EOL;;  // Вернет 3
echo mathOperation(6, 0, 'divide') . " <br/>" . PHP_EOL;;  // Вернет "Error: Division by zero"
echo mathOperation(6, 2, 'power') . " <br/>" . PHP_EOL;;  // Вернет "Error: Unsupported operation"$arg1 + $arg2;

echo "<br/>" . PHP_EOL;
echo "Задание 3 <br/>" . PHP_EOL;
echo "<br/>" . PHP_EOL;

$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин', 'Сасово'],
    "Республика Татарстан" => ["Казань", "Набережные Челны", "Альметьевск", "Елабуга"],
    // ... и т.д.
];

function parsRegions(array $regions): string
{
    $line = "";
    foreach ($regions as $key => $region) {
        $line .= "$key: ";
        $last = count($region) - 1;
        for ($i = 0; $i < $last; $i++) {
            $line .= "$region[$i], ";
        }
        $line .= $region[$last] . "<br/>" . PHP_EOL;
    }

    return $line;
}

// Примеры использования функции
echo parsRegions($regions) . " <br/>" . PHP_EOL;

echo "<br/>" . PHP_EOL;
echo "Задание 4 <br/>" . PHP_EOL;
echo "<br/>" . PHP_EOL;


function translit(string $text): string
{
    // Массив транслитерации
    $translatium = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '\'', 'ы' => 'i', 'ь' => '\'', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'Ts',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch', 'Ъ' => '\'', 'Ы' => 'I', 'Ь' => '\'', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya'
    ];

    // Специальные символы
    $specialChars = ['.', ',', '!', '?', ':', ';', ' '];

    $result = '';

    // Итерация по символам
    foreach (preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY) as $char) {
        // Проверка наличия в массиве транслитерации
        if (isset($translatium[$char])) {
            $result .= $translatium[$char];
        } elseif (in_array($char, $specialChars)) {
            // Добавление специальных символов без изменения
            $result .= $char;
        } else {
            // Пропуск неизвестных символов
            continue;
        }
    }

    return $result;
}

// Примеры использования функции

echo translit('Ёжик!') . " <br/>" . PHP_EOL;  // Выведет Yozhik!

echo "<br/>" . PHP_EOL;
echo "Задание 5 <br/>" . PHP_EOL;
echo "<br/>" . PHP_EOL;

function power(float | int $val, float | int $pow) : float | int
{
    if ($pow == 0) {
        return 1;
    } elseif ($pow > 0) {
        return $val * power($val, $pow - 1);
    } else {
        return 1 / power($val, -$pow-1);
    }
}

// Примеры использования функции
echo power(2, 3) . " <br/>" . PHP_EOL;  // Выведет 8
echo power(5, -2) . " <br/>" . PHP_EOL;  // Выведет 0.2

echo "<br/>" . PHP_EOL;
echo "Задание 6 <br/>" . PHP_EOL;
echo "<br/>" . PHP_EOL;

function formatTime()
{
    $hours = date('G');
    $minutes = date('i');
    $hours_string = ($hours == 1 || $hours == 21) ? 'час' : (($hours >= 2 && $hours <= 4) ? 'часа' : 'часов');
    $minutes_string = ($minutes == 1 || $minutes == 21 || $minutes == 31 || $minutes == 41 || $minutes == 51) ? 'минута' : (($minutes >= 2 && $minutes <= 4) || ($minutes >= 22 && $minutes <= 24) || ($minutes >= 32 && $minutes <= 34) || ($minutes >= 42 && $minutes <= 44) || ($minutes >= 52 && $minutes <= 54) ? 'минуты' : 'минут');

    return "$hours $hours_string $minutes $minutes_string";
}

// Пример использования функции
echo formatTime();  //Выведет 10 часа 48 минут