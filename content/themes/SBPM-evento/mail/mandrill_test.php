<?php
require_once 'Mandrill.php';
try {
    $mandrill = new Mandrill('dHYxOqIuVFJoMvpTVXggwA');
    $message = array(
        'html' => '<p>Example HTML content</p>',
        'text' => 'Example text content',
        'subject' => 'example subject',
        'from_email' => 'news@tommycolombia.com',
        'from_name' => 'Tommy Hilfiger News!',
        'to' => array(
            array(
                'email' => 'davidmov@gmail.com',
                'name' => 'David Mauricio Ospina'
            )
        ),
        'headers' => array('Reply-To' => 'news@tommycolombia.com'),
        'important' => false,
        'track_opens' => true,
        'track_clicks' => true,
        'auto_text' => null,
        'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        'preserve_recipients' => null,
    );
    $async = false;
    $ip_pool = 'Main Pool';
    $send_at = null;
    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
    print_r($result);
	echo "OK";
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )
    
    )
    */
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_PaymentRequired - This feature is only available for accounts with a positive balance.
    throw $e;
}
?>