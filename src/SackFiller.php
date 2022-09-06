<?php

declare(strict_types=1);

namespace Samdark\Sack;

final class SackFiller
{
    public function __construct(
        private int $volume
    ) {
    }

    /**
     * @param Item[] $items
     */
    public function fill(array $items): Sack
    {
        $matrix = [0 => array_fill(0, $this->volume + 1, 0)];

        /** @var int $i */
        foreach ($items as $i => $item) {
            for ($volume = 0; $volume <= $this->volume; $volume++) {
                if ($item->getVolume() > $volume) {
                    $matrix[$i + 1][$volume] = $matrix[$i][$volume];
                } else {
                    $matrix[$i + 1][$volume] = max(
                        $matrix[$i][$volume],
                        $matrix[$i][$volume - $item->getVolume()] + $item->getValue()
                    );
                }
            }
        }
        $maximumValue = $matrix[count($items)][$this->volume];

        $result = [];
        $valueReminder = $maximumValue;
        $volumeReminder = $this->volume;

        for ($i = count($items); $i > 0 && $valueReminder > 0; $i--) {
            if ($valueReminder !== $matrix[$i - 1][$volumeReminder]) {
                $resultItem = $items[$i - 1];
                $result[] = $resultItem;

                $valueReminder -= $resultItem->getValue();
                $volumeReminder -= $resultItem->getVolume();
            }
        }

        return new Sack($result, $maximumValue);
    }
}
