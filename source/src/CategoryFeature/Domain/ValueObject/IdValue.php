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

namespace App\CategoryFeature\Domain\ValueObject;

/**
 * Class IdValue
 * Warning: data value object must be immutable
 *
 * @package App\CategoryFeature\Domain\ValueObject
 */
class IdValue implements ValueObjectInterface
{
    private ?int $id;

    /**
     * @param int|null $id
     */
    public function __construct(int $id = null)
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->id;
    }
}
