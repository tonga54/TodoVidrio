<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

class EntriesProcessMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Resonsa data for mail view
     * @var
     */
    public $response;

    /**
     * Attachement File Path
     * @var
     */
    public $file;

    /**
     * This class name
     * @var string
     */
    public $mailable ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($response)
    {
        $this->response = $response;
        $this->mailable = class_basename(get_class($this));
    }

    /**
     * Sets emails attachment with the errors found
     * File attach format: CSV
     * @return string
     * @throws \League\Csv\CannotInsertRecord
     */
    private function setAttachment(){

        $header = ['User', 'Description', 'Start At', 'Duration', 'Toggl Project', 'Jira Key', 'Jira Worklog', 'Error'];
        $records = [];

        foreach ($this->response['worklog_errors'] as $error){
            $records[] = [
                'user_tij_name' => $error['entry']['user_tij_name'],
                'toggl_description' => $error['entry']['toggl_description'],
                'toggl_start_at' => $error['entry']['toggl_start_at'],
                'toggl_duration' => $error['entry']['toggl_duration'],
                'toggl_project_name' => $error['entry']['toggl_project_name'],
                'issue_key' => $error['entry']['issue_key'],
                'jira_worlog' => ($error['entry']['jira_worlog_id'] ? 'Yes ' . ($error['entry']['jira_issue_key'] != $error['entry']['issue_key'] ? '(' . $error['entry']['jira_issue_key'] . ')' : '') : 'No'),
                'error' => str_replace("<br>", " - ",$error['error']),
            ];
        }

        //load the CSV document from a string
        $csv = Writer::createFromString('');

        //insert the header
        $csv->insertOne($header);

        //insert all the records
        $csv->insertAll($records);

        $this->file = '/attachemnt_' . now()->format('Y-m-d_H.i.s') . '.csv';

        Storage::put($this->file, $csv->getContent());

        return $this->file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Toggl into Jira');

        $mailTemplate = $this->markdown('emails.entries.process');

        if (isset($this->response['worklog_errors'])){
            $mailTemplate = $mailTemplate->attachFromStorage($this->setAttachment());
        }

        return $mailTemplate;
    }
}