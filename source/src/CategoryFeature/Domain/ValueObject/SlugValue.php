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
 * Class SlugValue
 * Warning: data value object must be immutable
 *
 * @package App\CategoryFeature\Domain\ValueObject
 */
class SlugValue implements ValueObjectInterface
{
    private ?string $slug;

    /**
     * @param string|null $slug
     */
    public function __construct(string $slug = null)
    {
        $this->slug = $slug;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->slug;
    }
}
