<!-- Ceci est un bout de code crée par ChatGPT ne pas tenir compte -->











<?php

// namespace App\Command;

// use Symfony\Component\Console\Command\Command;
// use Symfony\Component\Console\Input\InputInterface;
// use Symfony\Component\Console\Output\OutputInterface;
// use Symfony\Component\Mailer\MailerInterface;
// use Symfony\Component\Mime\Email;
// use Doctrine\ORM\EntityManagerInterface;

// class SendReminderEmailsCommand extends Command
// {
//     private $entityManager;
//     private $mailer;

//     public function __construct(EntityManagerInterface $entityManager, MailerInterface $mailer)
//     {
//         parent::__construct();

//         $this->entityManager = $entityManager;
//         $this->mailer = $mailer;
//     }

//     protected function configure()
//     {
//         $this
//             ->setName('app:send-reminder-emails')
//             ->setDescription('Send reminder emails for upcoming meets.');
//     }

//     protected function execute(InputInterface $input, OutputInterface $output)
//     {
//         $upcomingMeets = $this->entityManager->getRepository(Meet::class)->findUpcomingMeets();

//         foreach ($upcomingMeets as $meet) {
//             $ownerEmail = $meet->getPet()->getCustomer()->getEmail();
//             $this->sendEmail($ownerEmail, $meet);
//         }

//         $output->writeln('Reminder emails sent successfully.');

//         return Command::SUCCESS;
//     }

//     private function sendEmail(string $recipient, Meet $meet)
//     {
//         $email = (new Email())
//             ->from('your@email.com')
//             ->to($recipient)
//             ->subject('Upcoming Meet Reminder')
//             ->text('Dear cat owner, you have a meet scheduled on ' . $meet->getDate()->format('Y-m-d'));

//         $this->mailer->send($email);
//     }
// } 