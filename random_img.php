<?	session_start();
  $name = "Random_Code";          // session variable name

  $fontSize = 5;              // font size (1 - 5)

  $fontColor = "FFFFFF";      // font color (RGB hexcode)

  $bgColor = "000000";        // background color (RGB hexcode)

  $lineColor = "000000";      // line color (RGB hexcode)



//========================================================================================================

// Functions

//========================================================================================================



  function convertRGB($color) {

    $color = eregi_replace('[^0-9a-f]', '', $color);

    return array(hexdec(substr($color, 0, 2)), hexdec(substr($color, 2, 2)), hexdec(substr($color, 4, 2)));

  }



  function createImage($text, $width, $height, $font = 5) {

    global $fontColor, $bgColor, $lineColor;



    if($img = @ImageCreate($width, $height)) {

      list($R, $G, $B) = convertRGB($fontColor);

      $fontColor = ImageColorAllocate($img, $R, $G, $B);

      list($R, $G, $B) = convertRGB($bgColor);

      $bgColor = ImageColorAllocate($img, $R, $G, $B);

      list($R, $G, $B) = convertRGB($lineColor);

      $lineColor = ImageColorAllocate($img, $R, $G, $B);

      ImageFill($img, 0, 0, $bgColor);



      for($i = 0; $i <= $width; $i += 5) {

        @ImageLine($img, $i, 0, $i, $height, $lineColor);

      }

      for($i = 0; $i <= $height; $i += 5) {

        @ImageLine($img, 0, $i, $width, $i, $lineColor);

      }



      $hcenter = $width / 2;

      $vcenter = $height / 2;

      $x = round($hcenter - ImageFontWidth($font) * strlen($text) / 2);

      $y = round($vcenter - ImageFontHeight($font) / 2);

      ImageString($img, $font, $x, $y, $text, $fontColor);



      if(function_exists('ImagePNG')) {

        header('Content-Type: image/png');

        @ImagePNG($img);

      }

      else if(function_exists('ImageGIF')) {

        header('Content-Type: image/gif');

        @ImageGIF($img);

      }

      else if(function_exists('ImageJPEG')) {

        header('Content-Type: image/jpeg');

        @ImageJPEG($img);

      }

      ImageDestroy($img);

    }

  }



//========================================================================================================

// Main

//========================================================================================================



  srand((double) microtime() * 1000000);

  $secCode = '';



  for($i = 0; $i < 6; $i++) $secCode .= rand(0, 9);

  $_SESSION[$name] = $secCode;



  createImage($secCode, 71, 21, $fontSize);

?>

