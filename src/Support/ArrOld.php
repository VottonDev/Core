<?php

/**
 * @author      Software Department <developers@rovota.com>
 * @copyright   Copyright (c), Rovota
 * @license     MIT
 */

namespace Rovota\Core\Support;

use ArrayAccess;

final class ArrOld
{

	// -----------------

	public static function combine(mixed $keys, mixed $values): array
	{
		return array_combine(convert_to_array($keys), convert_to_array($values));
	}

	public static function diff(mixed $first, mixed $second): array
	{
		return array_diff(convert_to_array($first), convert_to_array($second));
	}

	public static function diffAssoc(mixed $first, mixed $second): array
	{
		return array_diff_assoc(convert_to_array($first), convert_to_array($second));
	}

	public static function diffKeys(mixed $first, mixed $second): array
	{
		return array_diff_key(convert_to_array($first), convert_to_array($second));
	}

	public static function exists(mixed $array, string|int $key): bool
	{
		if ($array instanceof ArrayAccess) {
			return $array->offsetExists($key);
		}

		return array_key_exists($key, $array);
	}

	public static function random(array $array, int $items = 1): mixed
	{
		$count = count($array);
		$requested = $items === 0 ? 1 : (($items > $count) ? $count : $items);

		if ($requested === 1) {
			return $array[array_rand($array)];
		}

		$keys = array_rand($array, $requested);
		$result = [];

		foreach ($keys as $key) {
			$result[$key] = $array[$key];
		}

		return $result;
	}

	public static function replace(array $array, mixed $items): array
	{
		return array_replace($array, convert_to_array($items));
	}

	public static function replaceRecursive(array $array, mixed $items): array
	{
		return array_replace_recursive($array, convert_to_array($items));
	}

}