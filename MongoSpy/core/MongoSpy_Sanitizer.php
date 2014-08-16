<?php
namespace MongoSpy;

class MongoSpy_Sanitizer {
  static function sanitize_params($type, $options = array()) {
    $input_type = '';
    switch (strtolower($type)) {
      case 'get':
        $input_type = INPUT_GET;
      break;

      case 'post':
        $input_type = INPUT_POST;
      break;

      default:
        return false;
      break;
    }

    return filter_input_array($input_type);
  }
}
