<?php
if (!function_exists('getReturnData')) {
	function getReturnData($table, $column, $value, $return)
	{
		$data = '';
		$ci = &get_instance();
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column, $value);
		$qurey = $ci->db->get();
		$result	= $qurey->row();
		if (!empty($result->$return)) {
			return $result->$return;
		} else {
			return $data;
		}
	}
}

if (!function_exists('encrypt')) {
	function encrypt($text)
	{
		if (trim($text) == "") {
			return "";
		} else {
			$key = '12345678011120';
			$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
			$encrypted = openssl_encrypt($text, 'aes-256-cbc', $key, 0, $iv);
			return $garble = base64_encode($encrypted . '::' . $iv);
		}
	}
}
if (!function_exists('decrypt')) {
	function decrypt($text)
	{
		if (trim($text) == "") {
			return "";
		} else {
			$key = '12345678011120';
			list($encrypted_data, $iv) = explode('::', base64_decode($text), 2);
			return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
		}
	}
}

if (!function_exists('alias_to_text')) {
	function alias_to_text($alias)
	{
		if (empty($alias)) return '';
		$decoded = json_decode($alias, true);
		if (!is_array($decoded)) return $alias; // legacy plain text — return as-is
		$parts = [];
		foreach ($decoded as $a) {
			$name = trim(implode(' ', array_filter([
				$a['title']      ?? '',
				$a['forename']   ?? '',
				$a['middlename'] ?? '',
				$a['surname']    ?? '',
			])));
			if ($name !== '') $parts[] = $name;
		}
		return implode(', ', $parts);
	}
}
