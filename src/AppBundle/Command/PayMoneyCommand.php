<?php

namespace AppBundle\Command;

use AppBundle\Domain\Money\GBP;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PayMoneyCommand extends ContainerAwareCommand
{
    const USER_ARG = 'user';
    const AMOUNT_ARG = 'amount';

    protected function configure()
    {
        $this
            ->setName('pay-money')
            ->setDescription('Pay a user some money')
            ->addArgument($this::USER_ARG, InputArgument::REQUIRED, 'Argument description')
            ->addArgument($this::AMOUNT_ARG, InputArgument::REQUIRED, 'Argument description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $user = $input->getArgument($this::USER_ARG);
        $currency = new GBP($input->getArgument($this::AMOUNT_ARG));


        $output->writeln("Paying user $user ".$currency->getCode().$currency->getAmount());
    }

}
