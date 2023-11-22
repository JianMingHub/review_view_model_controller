<?php

use Illuminate\Support\Str;

// format d/m/y
if (! function_exists('formatVNDate')) {
    function formatVNDate($date) {
        return date("d/m/Y", strtotime($date));
    }
}

// get id from slug
if (! function_exists('extractIdFromSlug')) {
    function extractIdFromSlug($slugUrl)
    {
        $parts = explode('-', $slugUrl);
        $id = end($parts);
        
        return $id;
    }
}

// get number format
if (! function_exists('numberFormat')) {
    function numberFormat($number)
    {
        return number_format($number) . 'đ';
    }
}

// Convert string -> slug
if (! function_exists('str_slug')) {
    function str_slug($string)
    {
        $slug = Str::slug($string, '-'); 

        return $slug;
    }
}

// get Ip address of the user
if (! function_exists('get_client_ip')) {
    function get_client_ip() {
        $ipAddress = request()->ip();
        return $ipAddress;
    }
}

// Kiểm tra xem route hiện tại có trùng khớp với route được chỉ định hay ko
// Check if the current route matches the specified route
if (! function_exists('is_active_route')) {
    function is_active_route($routeName) {
        return request()->routeIs($routeName);
    }
}

// Giới hạn độ dài của một chuỗi và thêm ký tự kết thúc nếu vượt quá giới hạn.
// The limited length of a string and additional characters ends if the limit is exceeded.

if (! function_exists('str_limit')) {
    function str_limit($string, $limit = 20, $end = '...') {
        if (mb_strlen($string) <= $limit) {
            return $string;
        }

        return rtrim(mb_substr($string, 0, $limit)) . $end;
    }
}

// Exam use:
// $string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
// $limitedString = str_limit($string, 20);
// echo $limitedString; // Output: Lorem ipsum dolor si...
// ----------------------------***************---------------------------------


// Tạo ra một chuỗi ngẫu nhiên với độ dài cho trước.
// Generates a random string of the given length.
if (! function_exists('generate_random_string')) {
    function generate_random_string($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*+=?/';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}

// Exam use:
// $randomString = generate_random_string(8);
// echo $randomString; // Output: "2fB7R9hJ"
// ----------------------------***************---------------------------------


// Tạo ra một chuỗi duy nhất với độ dài cho trước
// Generates a unique string of the given length
if (! function_exists('generate_unique_code')) {
    function generate_unique_code($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*+=?/';
        $code = '';

        while (strlen($code) < $length) {
            $code .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return $code;
    }
}

// Exam use:
// $uniqueCode = generate_unique_code(8);
// echo $uniqueCode; // Output: "3A2B8R9H"

