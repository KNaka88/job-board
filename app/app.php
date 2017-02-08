<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__.'/../src/Contact.php';
    require_once __DIR__.'/../src/JobOpening.php';
    //require_once __DIR__."/../src/autoload.php";
    session_start();

    if(empty($_SESSION['list_of_jobs'])){
        $_SESSION['list_of_jobs']= array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));



    $app->post('/joblist', function () use ($app){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $contact = new Contact($name, $email, $phone);
        $JobOpening = new JobOpening($title, $description, $contact);
        $JobOpening-> save();


        // $job = new JobOpening($_POST['']

      return $app['twig']->render('joblist.html.twig', array('newjobs' => $JobOpening));
    });

    $app->get('/', function() use ($app){
      return $app['twig']->render('jobs.html.twig', array('newjobs' => $_SESSION['list_of_jobs']));
    });

    $app->post('/delete_JobOpening', function() use ($app) {
        JobOpening::deleteAll();
        return $app['twig']->render('delete_jobs.html.twig');
    });

    return $app;
 ?>
