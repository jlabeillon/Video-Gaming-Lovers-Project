<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
  public function admin()
  {
    return new Response('<html><body>Admin page !</body></html>');
  }
}


 ?>
