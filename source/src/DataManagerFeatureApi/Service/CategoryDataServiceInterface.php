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

use App\DataManagerFeatureApi\DTORequest\CategoryDataRequestInterface;
use App\DataManagerFeatureApi\DTOResponse\CategoryDataResponseInterface;

/**
 * @api
 * Interface CategoryDataServiceInterface
 * @package App\DataManagerFeatureApi\Service
 *
 * Api service for categories management
 *
 * WARNING! API DOESN'T know anything about realization!
 * This interfaces provides public access for other features to a feature realization.
 **/
interface CategoryDataServiceInterface
{
    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array;

    /**
     * @param int $categoryId
     * @return CategoryDataResponseInterface|null
     */
    public function getById(int $categoryId): ?CategoryDataResponseInterface;

    /**
     * @param CategoryDataRequestInterface $dtoRequest
     * @return CategoryDataResponseInterface
     */
    public function save(CategoryDataRequestInterface $dtoRequest): CategoryDataResponseInterface;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;

    /**
     * @param string $slug
     * @return CategoryDataResponseInterface|null
     */
    public function getBySlug(string $slug): ?CategoryDataResponseInterface;
}
