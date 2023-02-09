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

namespace App\DoctrineDataFeature\Application\DTOResponse;

use App\DataManagerFeatureApi\DTOResponse\CategoryDataResponseInterface;

/**
 * Class Category
 * Module response object. This object will be returned for other features usage.
 * @package App\DoctrineDataFeature\Application\DTOResponse
 **/
class CategoryResponse implements CategoryDataResponseInterface, DataResponseInterface
{
    private ?int $id = null;
    private ?string $title = null;
    private ?string $content = null;
    private ?string $slug = null;
    private bool $isActive = false;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(int $id = null): void
    {
        $this->id = $id;
    }

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
     * @return string
     */
    public function getSlug(): string
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
