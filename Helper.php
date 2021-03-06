<?php
namespace app;

class Helper{
    public static function array2csv(array $array)
    {
        if (count($array) == 0) {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys(reset($array)));
        foreach ($array as $row) {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }

    public static function download_send_headers($filename) {
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // force download
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }

    public static function sendemail($arrayTemp,$subject,$html_template,$receiver_email) {
        $bool =  \Yii::$app->mailer->compose(['html' => $html_template],['arrayTemp' => $arrayTemp])
                        ->setFrom(['support@iadel.org' => 'SIADEL' ])
                        ->setTo($receiver_email)
                        ->setSubject($subject)
                        ->send();
        }
    }

?>

