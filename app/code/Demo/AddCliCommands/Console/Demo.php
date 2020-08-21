<?php

namespace Demo\AddCliCommands\Console;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Demo extends Command
{
    private $productCollectionFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        $name = null
    )
    {
        parent::__construct($name);
        $this->productCollectionFactory = $productCollectionFactory;
    }

    protected function configure()
    {
        $this->setName('product:count')->setDescription('Get all products count');
//        $options = [
//            new InputOption('name', 'N', InputOption::VALUE_OPTIONAL, 'Your name', 'John')
//        ];
//        $this->setDefinition($options);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
//        $products = $this->productCollectionFactory->create()->addAttributeToSelect('name');
//        foreach ($products as $product) {
//            $output->writeln(sprintf('Processing %s', $product->getName()));
//        }
//        $output->writeln(sprintf('<info>You have %s products</info>', $products->count()));

        $progressBar = new ProgressBar($output, 12);
        for ($i = 0; $i < 12; $i++) {
            $progressBar->advance(1);
            sleep(1);
        }
        $progressBar->finish();
    }
}
