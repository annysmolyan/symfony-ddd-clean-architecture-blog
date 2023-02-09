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

namespace App\DataManagerFeatureApi\DTOResponse;

/**
 * @api
 * Interface CategoryDataResponseInterface
 * @package App\DataManagerFeatureApi\DTOResponse
 *
 * Module response object. This object will be returned for other features usage.
 *
 * WARNING! API DOESN'T know anything about realization!
 * This interfaces provides public access for other features to a feature realization.
 **/
interface CategoryDataResponseInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @param int|null $id
     */
    public function setId(int $id = null): void;

    /**
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * @param string|null $title
     */
    public function setTitle(string $title = null): void;

    /**
     * @return string|null
     */
    public function getContent(): ?string;

    /**
     * @param string|null $content
     */
    public function setContent(string $content = null): void;

    /**
     * @return string
     */
    public function getSlug(): string;

    /**
     * @param string|null $slug
     */
    public function setSlug(string $slug = null): void;

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void;
}
