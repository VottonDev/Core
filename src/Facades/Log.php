<?php

/**
 * @author      Software Department <developers@rovota.com>
 * @copyright   Copyright (c), Rovota
 * @license     MIT
 */

namespace Rovota\Core\Facades;

use Rovota\Core\Logging\Drivers\Stack;
use Rovota\Core\Logging\Interfaces\LogInterface;
use Rovota\Core\Logging\Logger;
use Rovota\Core\Logging\LoggingManager;

final class Log
{

	protected function __construct()
	{
	}

	// -----------------

	public static function channel(string $name): LogInterface
	{
		return LoggingManager::get($name);
	}

	/**
	 * @throws \Rovota\Core\Logging\Exceptions\UnsupportedDriverException
	 */
	public static function stack(array $channels): LogInterface
	{
		return Stack::createUsing($channels);
	}

	/**
	 * @throws \Rovota\Core\Logging\Exceptions\UnsupportedDriverException
	 */
	public static function build(array $options, string|null $name = null): LogInterface
	{
		return Logger::createUsing($options, $name);
	}

	// -----------------

	public static function debug(string $message, array $context = []): void
	{
		LoggingManager::get()->debug($message, $context);
	}

	public static function info(string $message, array $context = []): void
	{
		LoggingManager::get()->info($message, $context);
	}

	public static function notice(string $message, array $context = []): void
	{
		LoggingManager::get()->notice($message, $context);
	}

	public static function warning(string $message, array $context = []): void
	{
		LoggingManager::get()->warning($message, $context);
	}

	public static function error(string $message, array $context = []): void
	{
		LoggingManager::get()->error($message, $context);
	}

	public static function critical(string $message, array $context = []): void
	{
		LoggingManager::get()->critical($message, $context);
	}

	public static function alert(string $message, array $context = []): void
	{
		LoggingManager::get()->alert($message, $context);
	}

	public static function emergency(string $message, array $context = []): void
	{
		LoggingManager::get()->emergency($message, $context);
	}

}