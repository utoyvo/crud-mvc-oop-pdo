<?php
/**
 *                _                                             _
 *  ___ ___ _ _ _| |    _____ _ _ ___     ___ ___ ___     ___ _| |___
 * |  _|  _| | | . |   |     | | |  _|   | . | . | . |   | . | . | . |
 * |___|_| |___|___|   |_|_|_|\_/|___|   |___|___|  _|   |  _|___|___|
 *                                               |_|     |_|
 *
 * A simple and intuitive CRUD system using the MVC pattern in OOP paradigm. To connect to the database using PDO.
 *
 * @package   CRUD MVC OOP PDO
 * @license   https://github.com/utoyvo/crud-mvc-oop-pdo/blob/master/LICENSE MIT License
 * @link      https://github.com/utoyvo/crud-mvc-oop-pdo
 * @author    Oleksandr Klochko <utoyvo(at)protonmail.com>
 * @copyright 2020
 */

require_once( __DIR__ . '/core/App.php' );

$app = new App();

$app->autoload();
$app->config();
$app->start();
