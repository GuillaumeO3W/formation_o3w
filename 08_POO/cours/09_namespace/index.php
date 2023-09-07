<?php
use App\Contact\Message as ContactMessage;
use App\Blog\Message;
use App\Blog\BlogPost;

require 'BlogMessage.php';
require 'BlogPost.php';
require 'contact/ContactMessage.php';

$blog = new Message;
$blogPost = new BlogPost;
$contact = new Message;