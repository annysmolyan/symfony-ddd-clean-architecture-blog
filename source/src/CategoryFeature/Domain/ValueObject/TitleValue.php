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
 * Class TitleValue
 * Warning: data value object must be immutable
 *
 * @package App\CategoryFeature\Domain\ValueObject
 */
class TitleValue implements ValueObjectInterface
{
    private ?string $title;

    /**
     * @param string|null $title
     */
    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->title;
    }
}
