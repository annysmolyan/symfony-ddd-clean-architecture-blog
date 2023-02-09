<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License v3 (GPL 3.0)
 * It is available through the world-wide-web at this URL:
 * https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License v3 (GPL 3.0)
 */

declare(strict_types=1);

namespace App\PostFeature\Domain\ValueObject;

/**
 * Class TimeStampsValue
 * Warning: data value object must be immutable
 *
 * @package App\PostFeature\Domain\ValueObject
 */
class TimeStampsValue implements ValueObjectInterface
{
    private ?string $timestamps;

    /**
     * @param string|null $timestamps
     */
    public function __construct(string $timestamps = null)
    {
        $this->timestamps = $timestamps;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->timestamps;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
       return (string)$this->timestamps;
    }
}
