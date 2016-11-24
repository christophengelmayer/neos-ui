<?php
namespace Neos\Neos\Ui\NodeCreationHandler;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;
use TYPO3\TYPO3CR\Utility as NodeUtility;
use Neos\Neos\Ui\NodeCreationHandler\NodeCreationHandlerInterface;

class DocumentTitleNodeCreationHandler implements NodeCreationHandlerInterface
{
    /**
     * Set the node title for the newly created Document node
     *
     * @param NodeInterface $node The newly created node
     * @param array $data incoming data from the creationDialog
     * @return void
     */
    public function handle(NodeInterface $node, array $data)
    {
        if(isset($data['title']) && $node->getNodeType()->isOfType('TYPO3.Neos:Document')) {
            $node->setProperty('title', $data['title']);
            $node->setProperty('uriPathSegment', NodeUtility::renderValidNodeName($data['title']));
        }
    }
}