<?php

declare(strict_types=1);

namespace Dmytruk\Blog\ViewModel;
use Dmytruk\Blog\Service\PostRepository;
use Magento\Cms\Api\Data\PageInterface;
use Magento\Cms\Api\Data\PageSearchResultsInterface;
use Magento\Cms\Api\Data\PageSearchResultsInterfaceFactory;
use Magento\Cms\Model\Page;
use Magento\Framework\Api\SearchResults;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class Blog
 * @package Dmytruk\Blog\ViewModel
 */

class Blog implements ArgumentInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var $postRepository
     */
    private $postRepository;

    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * Blog constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct
    (
        SerializerInterface $serializer,
        PostRepository $postRepository,
        UrlInterface $url
    )
    {
        $this->serializer = $serializer;
        $this->postRepository = $postRepository;
        $this->url = $url;
    }

    public function getPostsJson(): string
    {
        $postsSearchResults = $this->postRepository->get();

        return $this->serializer->serialize($this->getPosts($postsSearchResults));
    }

    /**
     * @param PageSearchResultsInterface $postsSearchResults
     * @return array
     */
    private function getPosts(PageSearchResultsInterface $postsSearchResults)
    {
        $result = [];
        /**
         * @var PageInterface|Page $post
         */
        foreach ($postsSearchResults->getItems() as $post) {
            $result[] = [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'url' => $this->url->getUrl($post->getIdentifier()),
                'published_date' => $post->getData('publish_date'),
                'content' => $this->truncate(strip_tags($post->getContent()), 50),
                'author' => $post->getData('author')
            ];
        }
        return $result;
    }

    /**
     * @param string $phrase
     * @param int $maxWords
     * @return string
     */
    private function truncate($phrase, $maxWords): string
    {
        $phraseArray = explode(' ', $phrase);
        if (count($phraseArray) > $maxWords && $maxWords > 0)
        {
            $phrase = implode(' ', array_slice($phraseArray, 0, $maxWords)). '...';
        }
        return $phrase;
    }
//    private function substr($content)
//    {
//        return mb_substr(strip_tags($content), 0, 255);
//    }
}
