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

namespace App\PostFeature\Application\DTOResponse;

use App\PostFeatureApi\DTOResponse\PostDTOInterface;

/**
 * Class Post
 * Module response object. This object will be returned for other features usage.
 *
 * @package App\PostFeature\Application\DTOResponse
 */
class Post implements PostDTOInterface
{
    private ?int $id = null;
    private ?int $categoryId = null;
    private ?string $title = null;
    private ?string $content = null;
    private ?string $slug = null;
    private bool $isPublished = false;
    private ?string $createdAt = null;
    private ?string $updatedAt = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
     */
    public function setSlug(string $slug = null): void
    {
        $this->slug = $slug;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    /**
     * @param bool $published
     * @return void
     */
    public function setPublished(bool $published): void
    {
        $this->isPublished = $published;
    }

    /**
     * @return int|null
     */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @param int|null $id
     * @return void
     */
    public function setCategoryId(int $id = null): void
    {
        $this->categoryId = $id;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param string|null $updatedAt
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param string|null $createdAt
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
