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

namespace App\CategoryFeature\Domain\Entity;

use App\CategoryFeature\Domain\ValueObject\ContentValue;
use App\CategoryFeature\Domain\ValueObject\IdValue;
use App\CategoryFeature\Domain\ValueObject\SlugValue;
use App\CategoryFeature\Domain\ValueObject\ActiveValue;
use App\CategoryFeature\Domain\ValueObject\TitleValue;

/**
 * Class Category
 * @package App\CategoryFeature\Domain\Entity
 *
 * Domain Entity doesn't connect to any DB or other storages.
 * Represents an element of business logic.
 * Domain entities must not be revealed outside
 *
 * Use immutable value objects here
 */
class Category
{
    private IdValue $id;
    private TitleValue $title;
    private ContentValue $content;
    private SlugValue $slug;
    private ActiveValue $isActive;

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
     * @return ActiveValue
     */
    public function isActive(): ActiveValue
    {
        return $this->isActive;
    }

    /**
     * @param ActiveValue $active
     */
    public function setActive(ActiveValue $active): void
    {
        $this->isActive = $active;
    }
}
