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

namespace App\PostFeature\Domain\Entity;

use App\PostFeature\Domain\ValueObject\ContentValue;
use App\PostFeature\Domain\ValueObject\IdValue;
use App\PostFeature\Domain\ValueObject\PublishedValue;
use App\PostFeature\Domain\ValueObject\SlugValue;
use App\PostFeature\Domain\ValueObject\TimeStampsValue;
use App\PostFeature\Domain\ValueObject\TitleValue;

/**
 * Class Post
 * @package App\PostFeature\Domain\Entity
 *
 * Domain Entity doesn't connect to any DB or other storages.
 * Represents an element of business logic.
 * Domain entities must not be revealed outside
 *
 * Use immutable value objects here
 */
class Post
{
    private IdValue $id;
    private IdValue $categoryId;
    private TitleValue $title;
    private ContentValue $content;
    private SlugValue $slug;
    private PublishedValue $isPublished;
    private TimeStampsValue $createdAt;
    private TimeStampsValue $updatedAt;

    /**
     * @return IdValue
     */
    public function getId(): IdValue
    {
        return $this->id;
    }

    /**
     * @param IdValue $id
     */
    public function setId(IdValue $id): void
    {
        $this->id = $id;
    }

    /**
     * @return TitleValue
     */
    public function getTitle(): TitleValue
    {
        return $this->title;
    }

    /**
     * @param TitleValue $title
     */
    public function setTitle(TitleValue $title): void
    {
        $this->title = $title;
    }

    /**
     * @return ContentValue
     */
    public function getContent(): ContentValue
    {
        return $this->content;
    }

    /**
     * @param ContentValue $content
     */
    public function setContent(ContentValue $content): void
    {
        $this->content = $content;
    }

    /**
     * @return SlugValue
     */
    public function getSlug(): SlugValue
    {
        return $this->slug;
    }

    /**
     * @param SlugValue $slug
     */
    public function setSlug(SlugValue $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return PublishedValue
     */
    public function isPublished(): PublishedValue
    {
        return $this->isPublished;
    }

    /**
     * @param PublishedValue $publishedValue
     */
    public function setPublished(PublishedValue $publishedValue): void
    {
        $this->isPublished = $publishedValue;
    }

    /**
     * @return IdValue
     */
    public function getCategoryId(): IdValue
    {
        return $this->categoryId;
    }

    /**
     * @param IdValue $categoryId
     */
    public function setCategoryId(IdValue $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return TimeStampsValue
     */
    public function getUpdatedAt(): TimeStampsValue
    {
        return $this->updatedAt;
    }

    /**
     * @param TimeStampsValue $updatedAt
     */
    public function setUpdatedAt(TimeStampsValue $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return TimeStampsValue
     */
    public function getCreatedAt(): TimeStampsValue
    {
        return $this->createdAt;
    }

    /**
     * @param TimeStampsValue $createdAt
     */
    public function setCreatedAt(TimeStampsValue $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
