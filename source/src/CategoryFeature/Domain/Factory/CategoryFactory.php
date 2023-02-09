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

namespace App\CategoryFeature\Domain\Factory;

use App\CategoryFeature\Domain\Entity\Category;
use App\CategoryFeature\Domain\ValueObject\ContentValue;
use App\CategoryFeature\Domain\ValueObject\IdValue;
use App\CategoryFeature\Domain\ValueObject\SlugValue;
use App\CategoryFeature\Domain\ValueObject\ActiveValue;
use App\CategoryFeature\Domain\ValueObject\TitleValue;

/**
 * Class CategoryFactory
 * @package App\CategoryFeature\Domain\Factory
 */
class CategoryFactory
{
    /**
     * @param int|null $id
     * @param string|null $title
     * @param string|null $content
     * @param string|null $slug
     * @param bool $isActive
     * @return Category
     */
    public function create(
        int    $id = null,
        string $title = null,
        string $content = null,
        string $slug = null,
        bool   $isActive = false,
    ): Category
    {
        $category = new Category();

        $idValue = new IdValue($id);
        $category->setId($idValue);

        $titleValue = new TitleValue($title);
        $category->setTitle($titleValue);

        $contentValue = new ContentValue($content);
        $category->setContent($contentValue);

        $slugValue = new SlugValue($slug);
        $category->setSlug($slugValue);

        $statusValue = new ActiveValue($isActive);
        $category->setActive($statusValue);

        return $category;
    }
}
