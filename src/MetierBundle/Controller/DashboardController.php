<?php
/**
 * Created by IntelliJ IDEA.
 * User: anianougbo
 * Date: 06/12/2017
 * Time: 15:24
 */

namespace MetierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * Dashboard controller.
 *
 * @Route("")
 */

class DashboardController extends Controller
{

    /**
     * @Route("/", name="dashboard_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('dashboard/index.html.twig');
    }

}