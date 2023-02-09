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

namespace App\PostFeature\Domain\Factory;

use App\PostFeature\Domain\Entity\Post;
use App\PostFeature\Domain\ValueObject\ContentValue;
use App\PostFeature\Domain\ValueObject\IdValue;
use App\PostFeature\Domain\ValueObject\PublishedValue;
use App\PostFeature\Domain\ValueObject\SlugValue;
use App\PostFeature\Domain\ValueObject\TimeStampsValue;
use App\PostFeature\Domain\ValueObject\TitleValue;

/**
 * Class PostFactory
 * @package App\PostFeature\Domain\Factory
 */
class PostFactory
{
    /**
     * @param int|null $id
     * @param string|null $title
     * @param string|null $content
     * @param string|null $slug
     * @param bool $isPublished
     * @param int|null $categoryId
     * @param string|null $createdAt
     * @param string|null $updatedAt
     * @return Post
     */
    public function create(
        int    $id = null,
        string $title = null,
        string $content = null,
        string $slug = null,
        bool   $isPublished = false,
        int   $categoryId = null,
        string $createdAt = null,
        string $updatedAt = null
    ): Post
    {
        $post = new Post();

        $idValue = new IdValue($id);
        $post->setId($idValue);

        $titleValue = new TitleValue($title);
        $post->setTitle($titleValue);

        $contentValue = new ContentValue($content);
        $post->setContent($contentValue);

        $slugValue = new SlugValue($slug);
        $post->setSlug($slugValue);

        $publishedValue = new PublishedValue($isPublished);
        $post->setPublished($publishedValue);

        $categoryIdValue = new IdValue($categoryId);
        $post->setCategoryId($categoryIdValue);

        $createdAtValue = new TimeStampsValue($createdAt);
        $post->setCreatedAt($createdAtValue);

        $updatedAtValue = new TimeStampsValue($updatedAt);
        $post->setUpdatedAt($updatedAtValue);

        return $post;
    }
}
