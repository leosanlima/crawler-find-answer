<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use HeadlessChromium\BrowserFactory;

class CrawlerController extends Controller
{
    private $url = 'http://applicant-test.us-east-1.elasticbeanstalk.com/';

    public function answers(): View
    {
        return view('answers');
    }



    public function doFindAnswer()
    {
        try{
            $answer = [];

            $browserFactory = new BrowserFactory();
            $browser = $browserFactory->createBrowser(['noSandbox' => true]);

            $page = $browser->createPage();
            $page->navigate($this->url)->waitForNavigation();

            $page->callFunction('findAnswer()')->waitForPageReload();

            $elem = $page->dom()->querySelector('#answer');

            $answer = [
                'answer' => $elem->getText(),
                'status' => 'Ok'
            ];

        } catch (ElementNotFoundException $exception) {
            $answer = [
                'answer' => 'Error',
                'status' => 'Fail'
            ];
        }
        finally {
            $browser->close();
        }

        return $answer;

    }



}
