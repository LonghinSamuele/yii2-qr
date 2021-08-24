<?php


namespace samuelelonghin\qr;


use Da\QrCode\Contracts\LabelInterface;
use Da\QrCode\Contracts\WriterInterface;
use Da\QrCode\Label;
use yii\helpers\Html;

class QrCode extends \Da\QrCode\QrCode
{
    /**
     * @return string
     */
    public function asImage(): string
    {
        return Html::img($this->writeDataUri());
    }

    /**
     * @param WriterInterface $writer
     * @return QrCode
     */
    public function useWriter(WriterInterface $writer): QrCode
    {
        $cloned = clone $this;
        $cloned->writer = $writer;
        return $cloned;
    }

    /**
     * @param $red
     * @param $green
     * @param $blue
     * @return QrCode
     */
    public function useBackgroundColor($red, $green, $blue): QrCode
    {
        $cloned = clone $this;
        $cloned->backgroundColor = [
            'r' => $red,
            'g' => $green,
            'b' => $blue
        ];

        return $cloned;
    }

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return QrCode
     */
    public function useForegroundColor($red, $green, $blue): QrCode
    {
        $cloned = clone $this;
        $cloned->foregroundColor = [
            'r' => $red,
            'g' => $green,
            'b' => $blue
        ];

        return $cloned;
    }

    /**
     * @param LabelInterface|string $label
     * @return QrCode
     */
    public function setLabel($label): QrCode
    {
        $cloned = clone $this;
        $cloned->label = $label instanceof LabelInterface ? $label : new Label($label);

        return $cloned;
    }

    /**
     * @param int $size
     * @return QrCode
     */
    public function setSize($size): QrCode
    {
        $cloned = clone $this;
        $cloned->size = $size;

        return $cloned;
    }

    /**
     * @param int $margin
     * @return QrCode
     */
    public function setMargin($margin): QrCode
    {
        $cloned = clone $this;
        $cloned->margin = $margin;

        return $cloned;
    }
}