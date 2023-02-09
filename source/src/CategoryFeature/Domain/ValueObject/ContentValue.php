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
 * Class ContentValue
 * Warning: data value object must be immutable
 *
 * @package App\CategoryFeature\Domain\ValueObject
 */
class ContentValue implements ValueObjectInterface
{
    private ?string $content;

    /**
     * @param string|null $content
     */
    public function __construct(string $content = null)
    {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->content;
    }
}
