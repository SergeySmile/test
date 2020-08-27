<?php
declare(strict_types = 1);

/**
 * Require helpers
 */
require_once(__DIR__ . '/../helpers.php');

/**
 * Load application environment from .env file
 */
$dotenv = Dotenv\Dotenv::createMutable(dirname(__DIR__));
$dotenv->load();