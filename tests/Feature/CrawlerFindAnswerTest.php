<?php

namespace Tests\Feature;

use Tests\TestCase;
use HeadlessChromium\BrowserFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CrawlerFindAnswerTest extends TestCase
{
    /**
     * load url test.
     *
     * @return void
     */
    public function test_url()
    {
        $response = $this->get('/respostas');

        $response->assertStatus(200);
    }

    /**
     * validate answer test
     *
     * @return void
     */
    public function test_return_answer()
    {
        $browserFactory = new BrowserFactory();
        $browser = $browserFactory->createBrowser(['noSandbox' => true]);

        $page = $browser->createPage();
        $page->navigate('http://applicant-test.us-east-1.elasticbeanstalk.com/')->waitForNavigation();

        $page->callFunction('findAnswer()')->waitForPageReload();

        $elem = $page->dom()->querySelector('#answer');

        $this->assertTrue(!empty($elem));
    }

    /**
     * validate answer test
     *
     * @return void
     */
    public function test_answer_is_number()
    {
        $browserFactory = new BrowserFactory();
        $browser = $browserFactory->createBrowser(['noSandbox' => true]);

        $page = $browser->createPage();
        $page->navigate('http://applicant-test.us-east-1.elasticbeanstalk.com/')->waitForNavigation();

        $page->callFunction('findAnswer()')->waitForPageReload();

        $elem = $page->dom()->querySelector('#answer');

        $this->assertTrue(is_numeric($elem->getText()));

    }
}
