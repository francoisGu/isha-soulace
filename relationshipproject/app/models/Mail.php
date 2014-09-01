<?php

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';

//use Mailgun\Mailgun;

//# Instantiate the client.
//$mgClient = new Mailgun('key-4d5bdda319b3aa0fa127451dac2a4d3a');
//$domain = "sandbox23b19773e31943db896a0f0295122a22.mailgun.org";

//# Make the call to the client.
//$result = $mgClient->sendMessage("$domain",
                  //array('from'    => 'Mailgun Sandbox <postmaster@sandbox23b19773e31943db896a0f0295122a22.mailgun.org>',
                        //'to'      => 'terry <litaos@student.unimelb.edu.au>',
                        //'subject' => 'Hello terry',
                        //'text'    => 'Congratulations terry, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));
//// I'm creating an array with user's info but most likely you can use 
//// $user->email or pass $user object to closure later
/*/*//

$user = array(
    'email'=>'litaoshen_0315@hotmail.com',
    'name'=>'Laravelovich'
);

// the data that will be passed into the mail view blade template
$data = array(
    'detail'=>'Hello there, this is a testing message.',
    'name'	=> $user['name'];
);

// use Mail::send function to send email passing the data and using the $user 
// variable in the closure
Mail::send('emails.welcome', $data, function($message) use ($user)
{
  $message->from('admin@site.com', 'Site Admin');
  $message->to($user['email'], $user['name'])->subject('Welcome to My Laravel 
  app!');

  // $message->attach($pathToFile, array('as' => $display, 'mime' => $mime));

});

Mail::queue('emails.welcome', $data, function($message)
{
    $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
});

Mail::later(5, 'emails.welcome', $data, function($message)
{
    $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
});

Mail::queueOn('queue-name', 'emails.welcome', $data, function($message)
{
    $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
});

?>
