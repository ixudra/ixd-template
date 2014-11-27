<?php


class AdminController extends BaseController {

    function __construct(AdminViewFactory $adminViewFactory)
    {
        $this->adminViewFactory = $adminViewFactory;
    }


    public function index()
    {
        return $this->adminViewFactory->index();
    }

    public function reportBug()
    {
        return $this->adminViewFactory->reportBug();
    }

    public function processReportBug()
    {
        $input = Input::all();

        $validator = App::make('ReportBugFormValidator');
        $validator->setAttributes($input);
        if( $validator->fails() ) {
            $this->adminViewFactory->notifyUser('error', $validator->getErrors());
            return $this->adminViewFactory->reportBug($input);
        }

        $input['date'] = date('Y-m-d');
        $input['time'] = date('H:i:s');

        $mailService = App::make('MailService');
        $mailService->mailBugReport(
            array(
                'input'     => $input
            )
        );

        $this->adminViewFactory->notifyUser('success', array( Translate::recursive('admin.reportBug.success') ));

        return $this->adminViewFactory->reportBug(null);
    }

}