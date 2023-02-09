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

namespace App\FrontFeature\Presentation\Controller\Category;

use App\CategoryFeatureApi\Service\CategoryServiceInterface;
use App\PostFeatureApi\Service\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ViewController
 * @package App\FrontFeature\Presentation\Controller\Category
 *
 * WARNING! Presentation layer can communicate ONLY with Application layer or shared API.
 * Presentation layer doesn't know anything about domain
 */
#[Route('/category', name: 'frontend_feature_category_')]
class ViewController extends AbstractController
{
    private CategoryServiceInterface $categoryService;
    private PostServiceInterface $postService;

    /**
     * @param PostServiceInterface $postService
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(
        PostServiceInterface $postService,
        CategoryServiceInterface $categoryService
    ) {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
    }

    #[Route('/{slug}', name: 'view', methods: ["GET"])]
    public function __invoke(string $slug): Response
    {
        $category = $this->categoryService->getBySlug($slug);

        if (null === $category) {
            throw $this->createNotFoundException();
        }

        return $this->render('@frontend_feature_templates/baseTheme/layout/category/view.html.twig', [
            'category' => $category,
            'menuItems' => $this->categoryService->getList(["isActive" => true]),
            'seoTitle' => $category->getTitle(),
            'seoDescription' => $category->getTitle(),
            'postList' => $this->postService->getList(['category' => $category->getId(), 'isPublished' => true]),
        ]);
    }
}
