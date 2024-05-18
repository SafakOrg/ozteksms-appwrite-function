<?php

require_once(__DIR__ . '/OztekSms.php');

/**
 * Returns the contents of a file in the static folder
 * @param string $fileName
 * @return string Contents of static/{$fileName}
 */
function get_static_file(string $fileName): string
{
    $filePath = dirname(__FILE__) . '/../static/' . $fileName;
    return file_get_contents($filePath);
}

/**
 * Throws an exception if any of the keys are missing from the object
 * @param array|object $obj
 * @param string[] $keys
 * @throws \Exception
 */
function throw_if_missing(mixed $obj, array $keys): void
{
    $missing = [];
    foreach ($keys as $key) {
        if (!isset($obj[$key]) || empty($obj[$key])) {
            $missing[] = $key;
        }
    }
    if (count($missing) > 0) {
        throw new \Exception('Missing required fields: ' . implode(', ', $missing));
    }
}

function sendSms($to, $body)
{
    // $userId = $_ENV['OZTEK_USER_ID'];
    // $username = $_ENV['OZTEK_USERNAME'];
    // $password = $_ENV['OZTEK_PASSWORD'];
    // $orginator = $_ENV['OZTEK_ORIGINATOR'];
    $sms = new OztekSms(
        $_ENV['OZTEK_USER_ID'],
        $_ENV['OZTEK_USERNAME'],
        $_ENV['OZTEK_PASSWORD'],
        $_ENV['OZTEK_ORIGINATOR']
    );

    $TEST_PHONE = $_ENV['OZTEK_TEST_PHONE'];
    
    return $sms->sendSmsTest($TEST_PHONE,"Hello, World!");
}