<?php

namespace Larjectus;

class Objectus {

  public static function slurp($path, $content=[]) {

    foreach(scandir($path) as $file) {

      if (in_array($file, ['.','..']) || $file{0} == '_') {
        continue;
      }

      if (is_dir($path.$file)) {
        $newpath = $path.$file.'/';
        $content[$file] = self::slurp($newpath, []);
        continue;
      }

      list($name, $ext) = explode('.', $file);

      if (in_array($ext, ['json','jsn'])) {

        $parsed = json_decode(file_get_contents($path.$file), true);

        if ($parsed == null) {
          return trigger_error('Error parsing JSON : '.$path.$file, E_USER_NOTICE);
        } 

        $content[$name] = $parsed;

      }

      if (in_array($ext, ['yaml','yml'])) {
        $parsed = yaml_parse_file($path.$file);
        $content[$name] = $parsed;
      }

    }

    return $content;
  }

}
