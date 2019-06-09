<?php

namespace frontend\components;

use Yii;
use yii\base\Component;
use common\models\Notification;

class Helper extends Component
{
    public function notify($from_user, $to_user, $title, $message, $action, $reference, $reference_id)
    {
        $notification = new Notification();

        $notification->user_id = $to_user;
        $notification->title = $title;
        $notification->message = $message;
        $notification->action = $action;
        $notification->reference = $reference;
        $notification->reference_id = $reference_id;
        $notification->from_user = $from_user;

        try {
            $notification->save();

            return true;
        } catch (yii\db\Exception $e) {
            return false;
        }
    }

    public function vd($arr)
    {
        $this->setHeader(200);
        echo '<pre>';
        die(var_dump($arr));
    }

    public function getURL($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function response($status, $data = [])
    {
        $status_header = 'HTTP/1.1 '.$status.' '.$this->_getStatusCodeMessage($status);
        $content_type = 'application/json; charset=utf-8';

        header($status_header);
        header('Content-type: '.$content_type);
        header('X-Powered-By: '.'fastlink.com');

        return die(json_encode($data));
    }

    private function setHeader($status)
    {
        $status_header = 'HTTP/1.1 '.$status.' '.$this->_getStatusCodeMessage($status);
        $content_type = 'application/json; charset=utf-8';

        header($status_header);
        header('Content-type: '.$content_type);
        header('X-Powered-By: '.'fastlink.com');
    }

    private function _getStatusCodeMessage($status)
    {
        $codes = array(
      200 => 'OK',
      400 => 'Bad Request',
      401 => 'Unauthorized',
      402 => 'Payment Required',
      403 => 'Forbidden',
      404 => 'Not Found',
      406 => 'Not Acceptable',
      500 => 'Internal Server Error',
      501 => 'Not Implemented',
      );

        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    public function createSlug($string)
    {
        $string = str_replace(' ', '-', $string);
        $string = str_replace('--', '-', $string);
        $string = str_replace(' ', '', $string);
        $string = str_replace('!', '', $string);
        $string = str_replace('?', '', $string);
        $string = str_replace('#', '', $string);

        return mb_strtolower($string, 'UTF-8');
    }

    public function uniord($u)
    {
        // i just copied this function fron the php.net comments, but it should work fine!
    $k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8');
        $k1 = ord(substr($k, 0, 1));
        $k2 = ord(substr($k, 1, 1));

        return $k2 * 256 + $k1;
    }

    public function is_arabic($str)
    {
        if (mb_detect_encoding($str) !== 'UTF-8') {
            $str = mb_convert_encoding($str, mb_detect_encoding($str), 'UTF-8');
        }

    /*
      $str = str_split($str); <- this function is not mb safe, it splits by bytes, not characters. we cannot use it
      $str = preg_split('//u',$str); <- this function woulrd probably work fine but there was a bug reported in some php version so it pslits by bytes and not chars as well
     */
    preg_match_all('/.|\n/u', $str, $matches);
        $chars = $matches[0];
        $arabic_count = 0;
        $latin_count = 0;
        $total_count = 0;
        foreach ($chars as $char) {
            //$pos = ord($char); we cant use that, its not binary safe
      $pos = $this->uniord($char);
            echo $char.' --> '.$pos.PHP_EOL;

            if ($pos >= 1536 && $pos <= 1791) {
                ++$arabic_count;
            } elseif ($pos > 123 && $pos < 123) {
                ++$latin_count;
            }
            ++$total_count;
        }
        if (($arabic_count / $total_count) > 0.6) {
            // 60% arabic chars, its probably arabic
      return true;
        }

        return false;
    }
}
