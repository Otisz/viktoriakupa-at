<?php

namespace ViktoriaKupa;

use PHPMailer\PHPMailer\PHPMailer;

if (defined('SMTP_HOST') && SMTP_HOST) {
    add_action('phpmailer_init', function (PHPMailer $mailer): void {
        $mailer->isSMTP();
        $mailer->Host = SMTP_HOST;
        $mailer->Port = (int) SMTP_PORT;
        $mailer->SMTPAuth = false;
        $mailer->SMTPAutoTLS = false;
    });

    // The default wordpress@localhost sender is rejected as an invalid address
    add_filter('wp_mail_from', fn(): string => get_option('admin_email'));
}
