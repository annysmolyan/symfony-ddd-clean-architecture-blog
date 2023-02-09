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

namespace App\FrontFeature\Presentation\Controller\Post;

use App\CategoryFeatureApi\Service\CategoryServiceInterface;
use App\PostFeatureApi\Service\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ViewController
 * @package App\FrontFeature\Presentation\Controller\Post
 *
 * WARNING! Presentation layer can communicate ONLY with Application layer or shared API.
 * Presentation layer doesn't know anything about domain
 */
#[Route('/post', name: 'frontend_feature_post_')]
class ViewController extends AbstractController
{
    private PostServiceInterface $postService;
    private CategoryServiceInterface $categoryService;

    /**
     * @param CategoryServiceInterface $categoryService
     * @param PostServiceInterface $postService
     */
    public function __construct(
        CategoryServiceInterface $categoryService,
        PostServiceInterface $postService
    ) {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }

    #[Route('/{slug}', name: 'view', methods: ["GET"])]
    public function __invoke(string $slug): Response
    {
        $post = $this->postService->getBySlug($slug);

        if (null === $post) {
            throw $this->createNotFoundException();
        }

        return $this->render('@frontend_feature_templates/baseTheme/layout/post/view.html.twig', [
            'post' => $post,
            'menuItems' => $this->categoryService->getList(["isActive" => true]),
            'seoTitle' => $post->getTitle(),
            'seoDescription' => $post->getTitle(),
        ]);
    }
}
