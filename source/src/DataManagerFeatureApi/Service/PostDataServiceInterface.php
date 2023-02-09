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

namespace App\DataManagerFeatureApi\Service;

use App\DataManagerFeatureApi\DTORequest\PostDataRequestInterface;
use App\DataManagerFeatureApi\DTOResponse\PostDataResponseInterface;

/**
 * @api
 * Interface PostDataServiceInterface
 * @package App\DataManagerFeatureApi\Service
 *
 * Api service for posts management
 *
 * WARNING! API DOESN'T know anything about realization!
 * This interfaces provides public access for other features to a feature realization.
 */
interface PostDataServiceInterface
{
    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array;

    /**
     * @param int $postId
     * @return PostDataResponseInterface|null
     */
    public function getById(int $postId): ?PostDataResponseInterface;

    /**
     * @param PostDataRequestInterface $dtoRequest
     * @return PostDataResponseInterface
     */
    public function save(PostDataRequestInterface $dtoRequest): PostDataResponseInterface;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;

    /**
     * @param string $slug
     * @return PostDataResponseInterface|null
     */
    public function getBySlug(string $slug): ?PostDataResponseInterface;
}
