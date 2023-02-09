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

namespace App\CategoryFeature\Application\DTORequest;

use App\CategoryFeatureApi\DTORequest\CategoryCreateRequestInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CategoryCreate
 * Request object for a category creation
 *
 * @package App\CategoryFeature\Application\DTORequest
 */
class CategoryCreate implements CategoryCreateRequestInterface, CategoryRequestDTOInterface
{
    #[Assert\NotBlank]
    #[Assert\Type("string")]
    private ?string $title = null;

    #[Assert\Type("string")]
    private ?string $content = null;

    #[Assert\Type("string")]
    private ?string $slug = null;

    #[Assert\Type("bool")]
    private bool $isActive = false;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(string $title = null): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(string $content = null): void
    {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     */
    public function setSlug(string $slug = null): void
    {
        $this->slug = $slug;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->isActive = $active;
    }
}
