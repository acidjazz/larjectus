<?php

namespace larjectus;

class Objectus {


  public static function slurp($path, $content=[]) {

    foreach(scandir($path) as $file) {

      // ignore previous directory pointers and _ (example dirs/files)
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
          self::handler(E_USER_NOTICE, 'Error parsing JSON', $path.$file, 4);
          return false;
        } else {
          $content[$name] = $parsed;
        }

      }

      if (in_array($ext, ['yaml','yml'])) {
        $parsed = yaml_parse_file($path.$file);
        $content[$name] = $parsed;
      }

    }

    return $content;
  }

}
