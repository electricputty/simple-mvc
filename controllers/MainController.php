<?php

require(__DIR__ . '/../helpers/ViewHelper.php');
require(__DIR__ . '/../models/Enquiry.php');
require(__DIR__ . '/../config.php');

class MainController {

    /**
     * Render the homepage
     *
     * This is an example of how to pass
     * variables to a view using the
     * optional second parameter
     * of the ViewHelper::get method
     */
    public function renderHomePage () {
        $viewVars = [
            'title' => 'This is the homepage',
            'intro' => 'This is some intro text which is passed to the view as a variable'
        ];
        return ViewHelper::get('home', $viewVars);
    }

    /**
     * Render an error message
     *
     * @param string $error The error code / message
     *
     * @return string rendered view
     */
    public function renderError ($error) {
        return ViewHelper::get($error);
    }

    /**
     * This is the method which renders the enquiry form
     * The form HTML needs to be added to the
     * 'enquiry-form' view
     *
     * @return string rendered view
     */
    public function renderEnquiryForm () {
        return ViewHelper::get('enquiry-form');
    }

    /**
     * This is the method which processes the
     * enquiry form submission
     *
     * This will need to capture the vars
     * from the POST
     * Interact with the enquiry Model
     * to crate a new database record
     * Collect all the data required
     * for the email and then
     * call a method to compose and send
     * the email
     *
     * It should then provide from feedback
     * to the user
     */
    public function processEnquiryForm() {
        $enquiryModel = new Enquiry();

        // Test the DB connection
        //
        // Note - whilst this test
        // uses an echo statement to
        // output the results of this
        // test, in production code
        // you should *never* render
        // any HTML in a controller,
        // this is the job of a view
        $test = $enquiryModel->testConnection();
        echo('DB Connection test successfuly - ' . $test->num_rows . ' rows returned<br />');

        // Get the email recipients
        $recipients = $GLOBALS['email'];
        var_dump($recipients);
    }

    /**
     * This is the method which renders the list of enquiries
     * The table HTML needs to be added to the
     * 'enquiry-table' view
     *
     * @return string rendered view
     */
    public function renderEnquiryTable() {
        return ViewHelper::get('enquiry-table');
    }

    /**
     * Render the form to edit an entry
     *
     * You will need to know which entry to
     * edit so you can use a GET param
     * to pass this in: e.g. /render-edit-enquiry-form?id=1
     */
    public function renderEditEnquiry() {
        die('Render Edit Enquiry Form for entry');
    }


}
