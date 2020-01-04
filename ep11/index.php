<?php

require __DIR__ . "/vendor/autoload.php";

use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Handler\SendGridHandler;
use Monolog\Handler\TelegramBotHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger("web");
$logger->pushHandler(new BrowserConsoleHandler(Logger::DEBUG));
$logger->pushHandler(new StreamHandler(__DIR__ . "/log.txt", Logger::WARNING));
//$logger->pushHandler(new SendGridHandler(
//    SENEGRID["user"],
//    SENEGRID["passwd"],
//    "email@email.com",
//    "reinaldorti@gmail.com",
//    "Erro em site :" . date("d/m/Y H:i:s"),
//    Logger::CRITICAL
//));

$logger->pushProcessor(function ($record) {
    //$record["extra"]["server"] = $_SERVER;
    $record["extra"]["HTTP_HOST"] = $_SERVER["HTTP_HOST"];
    $record["extra"]["REQUEST_URI"] = $_SERVER["REQUEST_URI"];
    $record["extra"]["HTTP_METHOD"] = $_SERVER["REQUEST_METHOD"];
    $record["extra"]["HTTP_USER_AGENT"] = $_SERVER["HTTP_USER_AGENT"];
    return $record;
});

$tele_key = "";
$tele_channel = "";
$tele_handler = new TelegramBotHandler($tele_key, $tele_channel, Logger::EMERGENCY);
$tele_handler->setFormatter(new LineFormatter("%level_name%: %message%"));
$logger->pushHandler($tele_handler);

//DEBUG
$logger->debug("Olá, mundo!", ["logger" => true]);
//$logger->debug("Olá, mundo!", ["server" => $_SERVER]);
$logger->info("Olá, mundo!", ["logger" => true]);
$logger->notice("Olá, mundo!", ["logger" => true]);

//FILE
$logger->warning("Olá, mundo!", ["logger" => true]);
$logger->error("Olá, mundo!", ["logger" => true]);

//EMAIL
//$logger->critical("Olá, mundo!", ["logger" => true]);
//$logger->alert("Olá, mundo!", ["logger" => true]);

$logger->emergency("Essa mensagem foi enviada pleo Monolog!");