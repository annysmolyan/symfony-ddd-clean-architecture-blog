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

namespace App\PostFeature\Application\DTORequest;

use App\PostFeatureApi\DTORequest\PostCreateDTOInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class PostCreate
 * Request object for a post creation
 *
 * @package App\PostFeature\Application\DTORequest
 */
class PostCreate implements PostCreateDTOInterface, PostRequestDTOInterface
{
    #[Assert\Type("int")]
    private ?int $categoryId = null;

    #[Assert\NotBlank]
    #[Assert\Type("string")]
    private ?string $title = null;

    #[Assert\Type("string")]
    private ?string $content = null;

    #[Assert\Type("string")]
    private ?string $slug = null;

    #[Assert\Type("bool")]
    private bool $isPublished = false;

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
}
