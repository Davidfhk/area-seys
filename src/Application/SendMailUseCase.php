<?php

declare(strict_types=1);

namespace Src\Application;

use App\Mail\MailProfitability;
use Illuminate\Support\Facades\Mail;

class SendMailUseCase
{
    public function __invoke(string $name, int $profitability)
    {
        $mailData = [
            "name" => $name,
            "profitability" => $profitability
        ];

        Mail::to("hello@example.com")->send(new MailProfitability($mailData));
    }
}
