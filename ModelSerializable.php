<?php


namespace samuelelonghin\qr;


use app\widgets\QrCode;
use Da\QrCode\Writer\SvgWriter;
use yii\helpers\Url;

/**
 * Trait Serializable
 * @package app\models
 *
 * @property QrCode $qr
 */
trait ModelSerializable
{
    /**
     * @return string
     */
    public abstract static function getController();

    public abstract function getId();

    public function getQr(): QrCode
    {
        return (new QrCode(Url::to([static::getController() . '/view', 'id' => $this->getId()], 'https'), null, new SvgWriter()))
            ->setSize(100)
            ->useForegroundColor(0, 123, 255)
            ->setMargin(5);
    }

    public function getQrSvg($size = 100): string
    {
        return $this->qr->useWriter(new SvgWriter())->asImage();
    }

}